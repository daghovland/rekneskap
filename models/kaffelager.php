<?php
class Kaffelager extends AppModel {

	var $name = 'Kaffelager';
	var $primaryKey = 'nummer';
	var $displayField = 'beskrivelse';
	var $validate = array(
		'nummer' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Selger' => array(
			'className' => 'Selger',
			'foreignKey' => 'selger',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'lagertypenavn' => array(
			'className' => 'Lagertype',
			'foreignKey' => 'lagertype'
		),
		'lagerkonto' => array(
			'className' => 'Konto',
			'foreignKey' => 'konto'
		)
	);
	
	var $hasMany = array(
			     'Kaffelagerbeholdning', 
			     'lagerfraflytting' => array(
							 'className' => 'Kaffeflytting',
							 'foreignKey' => 'fra',
							 'conditions' => array('lagerfraflytting.fralagertype' => 3)
							 ),
			     'lagertilflytting' => array(
							 'className' => 'Kaffeflytting',
							 'foreignKey' => 'til',
							 'conditions' => array('lagertilflytting.tillagertype' => 3)
							 ),
		
			     );
	


// 	function lagerBeholdninger($dato = null){
// 		$beholdninger = array();
// 		$kaffelagre = $this->find('all', array('fields' => array('nummer', 'lagertype')));
// 		$lager_sum = array();
// 		$kaffetyper = $this->lagerfraflytting->Kaffepris->find('list'
//                                                                        , array('fields' => array('nummer', 'type') )
//                                                                        );
// 	 	foreach($kaffetyper as $kaffeid => $kaffetype)
// 			$lager_sum[$kaffeid] = array('antall' => 0, 'type' => $kaffetype);
// 		foreach($kaffelagre as $kaffelager){
// 		  $beholdninger[$kaffelager['Kaffelager']['nummer']] 
// 		    = $this->lagerbeholdning($kaffelager['Kaffelager']['nummer'], 
// 					     $kaffelager['Kaffelager']['lagertype'] == 2, 
// 					     $dato);
// 		  foreach($kaffetyper as $kaffeid => $kaffetype)
//                     $lager_sum[$kaffeid]['antall'] += $beholdninger[$kaffelager['Kaffelager']['nummer']][$kaffeid]['antall'];
// 		}
//                 $beholdninger[0] = $lager_sum;
// 		return $beholdninger;
// 	}

// 	function summer_salg($fra_dato, $til_dato){
//         	return $this->summer_flytting($fra_dato, $til_dato, 1, 'til');
// 	}

// 	function summer_innkjop($fra_dato, $til_dato){
//         	return $this->summer_flytting($fra_dato, $til_dato, 2, 'fra');
// 	}
	
// 	function summer_svinn($fra_dato, $til_dato){
//         	return $this->summer_flytting($fra_dato, $til_dato, 4, 'til');
// 	}
	
// 	function summer_utgift($fra_dato, $til_dato){
//         	return $this->summer_flytting($fra_dato, $til_dato, 5, 'til');
// 	}
// 	/**
// 	/**
// 	   Summerer hvor mye det er solgt av hver type i en periode
//         **/
// 	function summer_flytting($fra_dato, $til_dato, $lagertype, $inn){
//                 assert(is_numeric($lagertype));
// 		assert($inn == 'til' || $inn == 'fra');
// 		$allesalg = $this->lagerfraflytting->find('all', array('conditions'=>array('lagerfraflytting.' . $inn . 'lagertype' => $lagertype, 'lagerfraflytting.dato >=' => $fra_dato, 'lagerfraflytting.dato <=' => $til_dato)));
//                 $salgs_sum = $this->lagerfraflytting->Kaffepris->find('list');
//                 foreach($salgs_sum as $key => $type)
//                         $salgs_sum[$key] = 0;
//                 foreach($allesalg as $salg)
//                 	$salgs_sum[$salg['Kaffepris']['nummer']] += $salg['lagerfraflytting']['antall'];
// 		return $salgs_sum;
//         }


// 	function lagerbeholdning($id, $innkjop, $dato = null){
// 		$beholdninger = array();
// 		$kaffetyper = $this->lagerfraflytting->Kaffepris->find('list'
// 								       , array('fields' => array('nummer'
// 												 , 'type')
// 									       )
// 								       );

// 		foreach($kaffetyper as $typeid => $kaffetype){
// 		  if($innkjop == true)
// 		    $beholdninger[$typeid] = array('antall' => 0, 'type' => $kaffetype);
// 		  else {
// 		    $cond = array('lagerfraflytting.type' => $typeid);
// 		    if($dato)
// 		      $cond['lagerfraflytting.dato <'] = $dato;
// 		    $kaffeflyttinger 
// 		      = $this->lagerfraflytting->find('all'
// 						      , array('conditions' => $cond
// 							      )
// 						      );
// 		    $beholdninger[$typeid] 
// 		      = array('antall' => $this->flyttelisteBeholdning($kaffeflyttinger
// 								       , $id
// 								       , 'lagerfraflytting')
// 			      , 'type' => $kaffetype);
// 		  }
// 		}
// 		return $beholdninger; 
// 	}


// 	function flyttelisteBeholdning($flyttinger, $id, $array_key = null){
// 		$beholdning = 0;
// 		foreach($flyttinger as $flyttingAll){
// 		  if($array_key)
// 		    $flytting = $flyttingAll[$array_key];
// 		  else
// 		    $flytting = $flyttingAll;
// 			if($flytting['fra'] == $id && $flytting['fralagertype'] == 3)
// 				$beholdning -= $flytting['antall'];
// 			else if ($flytting['til'] == $id && $flytting['tillagertype'] == 3)
// 				$beholdning += $flytting['antall'];
// 		}
// 		return $beholdning;	
// 	}

// 	function lager_type_beholdning($lager, $type){
// 		$kaffetyper = $this->lagerfraflytting->Kaffepris->findAllByNummer($type);
// 		$typeid = $kaffetyper[0]['Kaffepris']['nummer'];
// 		return $this->flyttelisteBeholdning($kaffetyper[0]['KaffeTypeFlyttinger'], $lager);
// 	}
}
?>
