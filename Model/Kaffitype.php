<?php
class Kaffitype extends AppModel {

	var $name = 'Kaffitype';
	var $useTable = 'kaffityper';
	var $displayField = 'namn';
	var $hasMany = array('Kaffiinnkjop', 
			     'Kaffepris' => array('className' => 'Kaffepris', 
						  'foreignKey' => 'kaffetype_id')
			     );

	var $belongsTo = array('StandardKaffepris' => array('className' => 'Kaffepris', 
							    'foreignKey' => 'standard_kaffepris_id')
			       );
	
}
?>
