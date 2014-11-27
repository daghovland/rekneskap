<?php
class Kaffeflytting extends AppModel {

	var $name = 'Kaffeflytting';
	var $useTable = 'kaffeflytting';
	var $primaryKey = 'nummer';
	var $validate = array(
		'nummer' => array('numeric'),
		'type' => array('numeric'),
		'antall' => array('numeric'),
		'fra' => array('numeric'),
		'til' => array('numeric'),
		'fralagertype' => array('numeric'),
		'tillagertype' => array('numeric'),
	);

	var $hasOne = array('Kaffeflyttingvekt');

 	var $belongsTo = array(
			'Kaffibrenning',
			'Faktura' => array(
				'className' => 'Faktura',
				'foreignKey' => 'faktura'
			),
			'Kontantbetaling' => array(
						   'className' => 'Pengeflytting',
						   'foreignKey' => 'pengeflytting',
						   'conditions' => '',
						   'fields' => '',
						   'order' => ''
						   ),
			'Fra' => array(
				       'className' => 'Kaffelager',
				       'foreignKey' => 'fra',
				       'conditions' => '',
				       'fields' => '',
				       'order' => ''
				       ),
			'Til' => array(
				       'className' => 'Kaffelager',
				       'foreignKey' => 'til',
				       'conditions' => '',
				       'fields' => '',
				       'order' => ''
				       ),
			'Kaffepris' => array(
					     'className' => 'Kaffepris',
					     'foreignKey' => 'type',
					     'conditions' => '',
					     'fields' => '',
					     'order' => ''
					     ),
			'Fralagertypenavn' => array(
						    'className' => 'Lagertype',
						    'foreignKey' => 'fralagertype',
						    'conditions' => '',
						    'fields' => '',
						    'order' => ''
						    ),
			'Tillagertypenavn' => array(
						    'className' => 'Lagertype',
						    'foreignKey' => 'tillagertype',
						    'conditions' => '',
						    'fields' => '',
						    'order' => ''
						    ),
			'Selger' => array(
					  'className' => 'Selger',
					  'foreignKey' => 'ansvarlig'
					  ),
			'Kaffesalg',
			'Rabatt'
 			       );

  }
?>
