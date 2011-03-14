<?php
class Kunde extends AppModel {

	var $name = 'Kunde';
	var $primaryKey = 'nummer';
	var $validate = array(
		'nummer' => array('numeric')
	);

	var $hasMany   = array('Faktura' => array('className' => 'Faktura',
						  'dependent' => false,
						  'foreignKey' => 'kunde'));

	var $belongsTo = array(
			    'FakturaAdresse' => array(
						   'className' => 'Adresse',
						   'foreignKey' => 'fakturaadresse'
						      ),
			    'LeveringsAdresse' => array(
						   'className' => 'Adresse',
						   'foreignKey' => 'leveringsadresse'
						   )
			    );
}
?>
