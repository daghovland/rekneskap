<?php
class PengeflyttingerController extends AppController {

	var $cacheAction = array(
		'view/' => 36000,
		'index/' => 36000,
		'balanser/'  => 36000,
		'liste/'  => 36000,
		'liste_alle/'  => 36000
	);

	function index() {
		$this->Pengeflytting->recursive = 0;
		$this->set('pengeflyttinger', $this->paginate());
		$this->set('sumSalg', $this->Pengeflytting->summerSalg());		
		$this->set('vedlegg', $this->Pengeflytting->PengeflyttingBilag->find('list', array('fields' => array('bilag_id', 'bilag_id', 'pengeflytting_id'))));
		$this->set('kontoer', $this->Pengeflytting->Fra->find('list'));
		$this->Session->write('forrigeSide', array('controller' => 'pengeflyttinger', 'action' => 'index', '/page:1/sort:dato/direction:desc'));
	}

	function balanser(){
	  $this->set('balanser', $this->Pengeflytting->kontoBalanse(2));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Pengeflytting.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('pengeflytting', $this->Pengeflytting->read(null, $id));
		$this->set('kaffetyper', $this->Pengeflytting->Kaffeflytting->Kaffepris->find('list'));
		$this->set('kaffelagre', $this->Pengeflytting->Kaffeflytting->Fra->find('list'));
		$this->set('kaffelagertyper', $this->Pengeflytting->Kaffeflytting->Fralagertypenavn->find('list'));
		$this->Session->write('forrigeSide', array('controller' => 'pengeflyttinger', 'action' => 'view', $id));
	}

	function liste_alle(){
		$fradato = $this->Kaffe->dateToSql($this->request->data['fra']['fra']);
		$tildato = $this->Kaffe->dateToSql($this->request->data['til']['til']);
		$this->set('pengeflyttinger', $this->Pengeflytting->find('all', array('conditions' => 'Pengeflytting.dato BETWEEN \'' . $fradato . '\' AND \'' . $tildato . '\'')));
	}


	function liste(){
		$fradato = $this->Kaffe->dateToSql($this->request->data['fra']);
		$tildato = $this->Kaffe->dateToSql($this->request->data['til']);
		$konto = $this->request->data['Pengeflytting']['konto'];
		if(!is_numeric($konto))
			$this->Session->setFlash(__('Feil i kontonummer', true));
		else {	
		  $pengeflyttinger = $this->paginate('Pengeflytting',  array('(Pengeflytting.fra =' . $konto . ' OR Pengeflytting.til = ' . $konto . ')', 
										'Pengeflytting.dato >= ' => $fradato,
										'Pengeflytting.dato <='  => $tildato));
		  $this->set('pengeflyttinger', $pengeflyttinger);
		  $this->set('beholdningStart', $this->Pengeflytting->Fra->balanse_dato($konto, $fradato));
		  $this->set('beholdningSlutt', $this->Pengeflytting->Fra->balanse_dato_etter($konto, $tildato));
		}
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Pengeflytting->create();
			if ($this->Pengeflytting->save($this->request->data)) {
				$this->Session->setFlash(__('The Pengeflytting has been saved', true));

				$this->redirect(array('action'=>'view', $this->Pengeflytting->id));
			} else {
				$this->Session->setFlash(__('The Pengeflytting could not be saved. Please, try again.', true));
			}
		}
		if(isset($this->params['named']['kaffesalg']) && is_numeric($this->params['named']['kaffesalg']))
			$this->set('kaffesalg_nummer', $this->params['named']['kaffesalg']);
		if(isset($this->params['named']['dato']) && preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $this->params['named']['dato']))
			$this->set('kaffesalg_dato', $this->params['named']['dato']);
		if(isset($this->params['named']['kaffiimport']) && is_numeric($this->params['named']['kaffiimport']))
                        $this->set('kaffiimport_id', $this->params['named']['kaffiimport']);
                else
                        $this->set('kaffiimport_id', 0);
		if(isset($this->params['named']['kaffibrenning']) && is_numeric($this->params['named']['kaffibrenning']))
                        $this->set('kaffibrenning_id', $this->params['named']['kaffibrenning']);
                else
                        $this->set('kaffibrenning_id', 0);
		$frakontoer = $this->Pengeflytting->Fra->find('list', array('fields' => 'beskrivelse'));
		$tilkontoer = $this->Pengeflytting->Til->find('list', array('field' => 'beskrivelse'));
		$dekningsFakturaer = $this->Pengeflytting->Faktura->find('list');
		$fakturaer = $this->Pengeflytting->Faktura->find('list');
		$kaffesalg = $this->Pengeflytting->Kaffesalg->find('list');
		$kaffiimportar = $this->Pengeflytting->Kaffiimport->find('list');
		$kaffibrenningar = $this->Pengeflytting->Kaffibrenning->find('list');
		$this->set(compact('frakontoer', 'tilkontoer', 'kaffiimportar', 'kaffibrenningar', 'fakturaer', 'kaffesalg', 'dekningsFakturaer'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Pengeflytting', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Pengeflytting->save($this->request->data)) {
				$this->Session->setFlash(__('The Pengeflytting has been saved', true));
				if($this->Session->check('forrigeSide')){
					$this->redirect($this->Session->read('forrigeSide'));
					$this->Session->delete('forrigeSide');
				} else 
					$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Pengeflytting could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Pengeflytting->read(null, $id);
		}
		$frakontoer = $this->Pengeflytting->Fra->find('list', array('fields' => array('nummer', 'beskrivelse')));
		$tilkontoer = $this->Pengeflytting->Til->find('list');
		$dekningsFakturaer = $this->Pengeflytting->Faktura->find('list');
		$kaffesalg = $this->Pengeflytting->Kaffesalg->find('list');
		$kaffiimportar = $this->Pengeflytting->Kaffiimport->find('list');
		$kaffibrenningar = $this->Pengeflytting->Kaffibrenning->find('list');
		$this->set(compact('kaffibrenningar', 'kaffiimportar', 'frakontoer','tilkontoer','dekningsFakturaer', 'kaffesalg'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Pengeflytting', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pengeflytting->del($id)) {
			$this->Session->setFlash(__('Pengeflytting deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function faktura_innbetaling() {
		if(count($this->params['pass']) > 0 && $this->params['pass'][0] > 0){
			$faktura_id = $this->params['pass'][0];
			$faktura = $this->Pengeflytting->Faktura->findByNummer($faktura_id);
			  if(!$faktura){
			    $this->Session->setFlash(__('Invalid id for Pengeflytting', true));
			    $this->redirect(array('controller' => 'fakturaer', 'action'=>'ubetalte'));
			  }
		}
		if (!empty($this->request->data)) {
			$faktura_id = $this->request->data['Pengeflytting']['dekningsFaktura'];
			$this->Pengeflytting->create();
			if($this->request->data['Pengeflytting']['kroner'] >= $this->Pengeflytting->Faktura->utestaende($faktura_id)){
			  $this->request->data['Pengeflytting']['dekningsFaktura'] = $faktura_id;
			}
			
			if ($this->Pengeflytting->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The Pengeflytting has been saved', true));
				$this->redirect(array('action'=>'view', $this->Pengeflytting->id));
			} else {
				$this->Session->setFlash(__('The Pengeflytting could not be saved. Please, try again.', true));
			}
		}
		$frakontoer = $this->Pengeflytting->Fra->find('list', array('fields' => 'beskrivelse'));
		$tilkontoer = $this->Pengeflytting->Til->find('list', array('field' => 'beskrivelse'));
		$fakturaer = $this->Pengeflytting->Faktura->find('list');
		$utestaende = $this->Pengeflytting->Faktura->utestaende($faktura_id);
		$this->request->data['Pengeflytting']['dekningsFaktura'] = $faktura_id;
		$this->request->data['Pengeflytting']['kroner'] = $this->Pengeflytting->Faktura->utestaende($faktura_id);
		$this->set('dekningsFakturaer', $this->Pengeflytting->Faktura->find('list', array('betalt' => 0)));
		$this->set(compact('utestaende', 'faktura', 'frakontoer', 'tilkontoer', 'fakturaer'));
	}


	function lastopp(){
	  if(!empty($this->request->data)){
	    $filinfo = $this->request->data['Pengeflytting']['submittedfile'];
	    $csvfile = $filinfo['tmp_name'];
	    
	    if(!$filinfo['size']){
	      $this->Session->setFlash(__("Fila er tom. Prøv på nytt.", true));
	      return;
	    }

	    if(!file_exists($csvfile)) {
	      $this->Session->setFlash(__("Fil forsvant under opplasting. Dårlig tegn.", true));
	      return;
	    }
	    
	    $file = fopen($csvfile,"r");
	    
	    if(!$file) {
	      $this->Session->setFlash(__("Kunne ikkje lesa fil. Dårlig tegn.", true));
	      return;
	    }
	    
	    $size = filesize($csvfile);
	    
	    if($size != $filinfo['size']){
	      $this->Session->setFlash(__("Fila endra storleik etter opplasting. Dårlig tegn.", true));
	      return;
	    }

            $feil = array();
            $lagret = array();
	    $linearray = fgetcsv($file, $size, ",", '"');
	    while($linearray = fgetcsv($file, $size, ",", '"')){
	      if(count($linearray) > 2){
		$nykunde = array('Pengeflytting' => array(
							  'beskrivelse' => $linearray[1], 
							  'dato' => $this->Kaffe->BankDatoSql($linearray[2]))); 
		if($linearray[3] != ""){
		  $nykunde['Pengeflytting']['til'] = 4;
		  $nykunde['Pengeflytting']['fra'] = 45;
		  $penger = explode(",", $linearray[3]);
		  $nykunde['Pengeflytting']['kroner'] = $penger[0];
		  $nykunde['Pengeflytting']['oere'] = $penger[1];
                } else {
		  $nykunde['Pengeflytting']['til'] = 45;
		  $nykunde['Pengeflytting']['fra'] = 4;
		  $penger = explode(",", $linearray[4]);
		  $nykunde['Pengeflytting']['kroner'] = $penger[0];
		  $nykunde['Pengeflytting']['oere'] = $penger[1];
		}
	        if($this->Pengeflytting->saveAll($nykunde))
                  $lagret[] = $nykunde;
                else
                  $feil[] = $nykunde;
	      }
	    }
	    $this->set(compact('lagret', 'feil'));
	  }
	}


  }
?>
