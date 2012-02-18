<?php
class Konto extends AppModel {

	var $name = 'Konto';
	var $primaryKey = 'nummer';
	var $displayField = 'beskrivelse';
	var $validate = array(
		'nummer' => array('numeric'),
		'beskrivelse' => array('notempty'),
		'type' => array('numeric'),
		'ansvarlig' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Kontotype' => array(
			'className' => 'Kontotype',
			'foreignKey' => 'type',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Selger' => array(
			'className' => 'Selger',
			'foreignKey' => 'ansvarlig',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
 	var $hasMany = array(
 			     'kontoInnskudd' => array(
 						      'className' => 'Pengeflytting',
 						      'foreignKey' => 'til'
 						      ),
 			     'kontoUtskudd' => array(
 						     'className' => 'Pengeflytting',
 						     'foreignKey' => 'fra'
 						     ),
		             'kontoutskrift' => array('className' => 'Kontoutskrift',
						      'foreignKey' => 'konto_id',
						      )
 			     );
 

	var $hasOne = array('Kontobalanse');
	/**
		Tester at reegnskapet er i overenstemmelse over en periode
	**/
	function test_balanse_datoer($fra_dato, $til_dato){
		$beholdninger = $this->beholdninger_saldo($fra_dato, $til_dato);
 		$utgfiter = $this->utgift_saldoer($fra_dato, $til_dato);			
 		$inntekter = $this->inntekt_saldoer($fra_dato, $til_dato);			
		$sum = $this->oere_avrunding($beholdninger[0]['start']['kroner'] + $inntekter[0]['kroner'] - $utgifter[0]['kroner'],
					     $beholdninger[0]['start']['oere'] + $inntekter[0]['oere'] - $utgifter[0]['oere']);
		if($sum['kroner'] != $beholdninger[0]['slutt']['kroner']
		   || $sum['oere'] != $beholdninger[0]['slutt']['oere']){
                 	debug($beholdninger);
			debug($utgfiter);
			debug($inntekter);
			return false;
		}
		return true;
        }


	function test_balanse(){
		for($i = 1; $i < 13; $i++){
			for($j = $i+1; $j < 13; $j++){
				if(!$this->test_balanse_datoer('2009-'.$i.'-01','2009-'.$j.'-31'))
					return false;
			}
		}
		return true;
	}

	/* 
		Returnerer balansen i regnskapskontoer. Brukes bl.a. til selgergjeld
	*/

	function balanser() {
                $kontonumre = $this->find('list');
                $balanser = array();
                foreach($kontonumre as $kontonummer => $kontonavn){
                        $kontodataer = $this->kontoInnskudd->findAllByTil($kontonummer);
                        $kroner = 0;
                        $oere = 0;
                        foreach($kontodataer as $inn){
                                $kroner += $inn['kontoInnskudd']['kroner'];
                                $oere += $inn['kontoInnskudd']['oere'];
                        }
                        $kontodataer = $this->kontoUtskudd->findAllByFra($kontonummer);
                        foreach($kontodataer as $ut){
                                $kroner -= $ut['kontoUtskudd']['kroner'];
                                $oere -= $ut['kontoUtskudd']['oere'];
                        }
                        $balanser[$kontonummer] = $this->oere_avrunding($kroner,$oere);
                }
                return $balanser;
        }

	function balanser_dato($dato){
		$kontonumre = $this->find('list');
                $balanser = array();
	
		foreach($kontonumre as $kontonummer => $kontonavn){
			$balanser[$kontonummer] = $this->balanse_dato($kontonummer, $dato);
			
		}
		return $balanser;
	}

	
	function balanse_intervall($konto_id, $fra, $til){
		$innskudd = $this->kontoInnskudd->find('all', 
						       array('conditions' => array('kontoInnskudd.til ' => $konto_id,
										   'kontoInnskudd.dato >= ' => $fra,
										   'kontoInnskudd.dato <= ' => $til
										   )
							     )
						       );
		$utskudd = $this->kontoUtskudd->find('all', 
						     array('conditions' => array('kontoUtskudd.fra ' => $konto_id,
										 'kontoUtskudd.dato >=' => $fra,
										 'kontoUtskudd.dato <=' => $til
										 )
							   )
						     );
		return $this->balanse_data($innskudd, $utskudd);
	}

	function beholdninger_saldo($fra, $til){
		$aktiva = $this->findAllByType(3);
		$passiva = $this->findAllByType(4);
		$penger = $this->findAllByType(7);
		$beholdninger = array_merge($aktiva, $passiva);
		$total = array('Konto' => array('beskrivelse' => 'Totalt',
							 'nummer' => 0),
			       'start' => array('kroner' => 0, 'oere' => 0),
			       'slutt' => array('kroner' => 0, 'oere' => 0));
		foreach($beholdninger as $nr => $beholdning){
		  $beholdninger[$nr]['start'] = $this->balanse_dato($beholdning['Konto']['nummer'], $fra);
		  $beholdninger[$nr]['slutt'] = $this->balanse_dato($beholdning['Konto']['nummer'], $til);
		  $total['start'] = $this->penger_summer($total['start'], $beholdninger[$nr]['start']);
		  $total['slutt'] = $this->penger_summer($total['slutt'], $beholdninger[$nr]['slutt']);
		}
		$penger_total = array('Konto' => array('beskrivelse' => 'Penger heime hos oss',
						       'nummer' => -1),
				      'start' => array('kroner' => 0, 'oere' => 0),
				      'slutt' => array('kroner' => 0, 'oere' => 0));
		foreach($penger as $nr => $pengeflytting){
		  $penger_total['start'] = $this->penger_summer($penger_total['start'], $this->balanse_dato($pengeflytting['Konto']['nummer'], $fra));
		  $penger_total['slutt'] = $this->penger_summer($penger_total['slutt'], $this->balanse_dato($pengeflytting['Konto']['nummer'], $til));
		}
		$beholdninger[] = $penger_total;
		
		$total['start'] = $this->penger_summer($total['start'], $penger_total['start']);
		$total['slutt'] = $this->penger_summer($total['slutt'], $penger_total['slutt']);
		$beholdninger[] = $total;
		return $beholdninger;
	}

	function utgift_saldoer($fra, $til){
		$saldoer = $this->periode_saldoer(1, $fra, $til);
		$sumut = array('kroner' => 0, 'oere' => 0);
		foreach($saldoer as $saldo)
		  $sumut = $this->penger_summer($sumut, $saldo['saldo']);
		$saldoer[] = array('Konto' => array('beskrivelse' => 'Sum ut',
						    'nummer' => 0),
				   'saldo' => $sumut
				   );
		return $saldoer;
	}

	// Returnerer saldoer for kaffesalg delt opp etter konto
	function kaffesalg_saldoer($fra, $til){
		return $this->periode_saldoer(6, $fra, $til);
	}
	function inntekt_saldoer($fra, $til){
		$saldoer = $this->periode_saldoer(2, $fra, $til);
		$saldoer[] = array('Konto' => array('nummer' => 7,
						    'beskrivelse' => 'Kaffesalg'
						    ),
				   'saldo' => $this->kaffesalg_sum_saldo($fra, $til)
				   );
		$suminn = array('kroner' => 0, 'oere' => 0);
		foreach($saldoer as $i => $saldo){
		  $saldoer[$i]['saldo'] = $this->oere_avrunding( - $saldo['saldo']['kroner'],
								 $saldo['saldo']['oere']);
		  $suminn = $this->penger_summer($suminn, $saldoer[$i]['saldo']);
		}
		$saldoer[] = array('Konto' => array('beskrivelse' => 'Sum inn',
						    'nummer' => 0),
				   'saldo' => $suminn
				   );
		return $saldoer;
	}

	// Summerer alt kaffesalg i ein periode
	function kaffesalg_sum_saldo($fra, $til){
	  return $this->periode_sum_saldoer(6, $fra, $til);
	}

	function periode_saldoer($type, $fra, $til){
		$inntekter = $this->findAllByType($type);
		foreach($inntekter as $nr => $inntekt)
			$inntekter[$nr]['saldo'] = $this->balanse_intervall($inntekt['Konto']['nummer'], $fra, $til);
		return $inntekter;
	}

	// Summerer en konto gruppe over en periode
	function periode_sum_saldoer($type, $fra, $til){
		$inntekter = $this->findAllByType($type);
		$saldo = array('kroner' => 0, 'oere' => 0);
		foreach($inntekter as $nr => $inntekt)
		  $saldo = $this->penger_summer($saldo, 
						$this->balanse_intervall($inntekt['Konto']['nummer'], 
									 $fra, 
									 $til)
						);
		return $saldo;
	}

	

	function balanse_dato_etter($konto_id, $dato){
	  $innskudd = $this->kontoInnskudd->find('all', 
						 array('conditions' => array('kontoInnskudd.til' => $konto_id,
									     'kontoInnskudd.dato <= ' => $dato)
						       )
						 );
	  $utskudd = $this->kontoUtskudd->find('all', 
					       array('conditions' => array('kontoUtskudd.fra' => $konto_id,
									   'kontoUtskudd.dato <= ' => $dato)
						     )
					       );
	  return $this->balanse_data($innskudd, $utskudd);
	}


	function balanse_dato($konto_id, $dato){
	  $innskudd = $this->kontoInnskudd->find('all', 
						 array('conditions' => array('kontoInnskudd.til ' => $konto_id,
									     'kontoInnskudd.dato < '=> $dato)
						       )
						 );
	  $utskudd = $this->kontoUtskudd->find('all', 
					       array('conditions' => array('kontoUtskudd.fra ' => $konto_id,
									   'kontoUtskudd.dato < ' => $dato)
						     )
					       );
	  return $this->balanse_data($innskudd, $utskudd);
	}

	function balanse($konto_id){
		$innskudd = $this->kontoInnskudd->find('all', array('conditions' => 'kontoInnskudd.til = ' . $konto_id));
		$utskudd = $this->kontoUtskudd->find('all', array('conditions' => 'kontoUtskudd.fra = ' . $konto_id));
                return $this->balanse_data($innskudd, $utskudd);
	}

	function balanse_data($innskudd, $utskudd){
                $balanseKr = 0;
                $balanseOere = 0;
                foreach($innskudd as $inn){
                        $balanseKr += $inn['kontoInnskudd']['kroner'];
                        $balanseOere += $inn['kontoInnskudd']['oere'];
                }
                foreach($utskudd as $ut){
                        $balanseKr -= $ut['kontoUtskudd']['kroner'];
                        $balanseOere -= $ut['kontoUtskudd']['oere'];
                }
                return $this->oere_avrunding($balanseKr, $balanseOere);
	}


	function penger_summer($en, $to){
	  if($en['kroner'] * $en['oere'] < 0)
		$en['oere'] *= -1;
	  if($to['kroner'] * $to['oere'] < 0)
		$to['oere'] *= -1;
	  return $this->oere_avrunding($en['kroner'] + $to['kroner'], $en['oere'] + $to['oere']);
	}
	function penger_minus($en, $to){
	  return $this->oere_avrunding($en['kroner'] - $to['kroner'], $en['oere'] - $to['oere']);
	}


        function oere_avrunding($kroner, $oere) {
                        $kroner += intval($oere / 100);
                        $oere = $oere % 100;
                        if($kroner >= 0 && $oere < 0){
                                $kroner -= 1;
                                $oere  = 100 + $oere;
                        } else if($kroner < 0 && $oere < 0){
                                $oere  = - $oere;
                        } else if($kroner < 0 && $oere > 0){
                                $kroner += 1;
                                $oere  = 100 - $oere;
                        }
                return array('kroner' => $kroner, 'oere' => sprintf("%02d", $oere));
        }

}
?>
