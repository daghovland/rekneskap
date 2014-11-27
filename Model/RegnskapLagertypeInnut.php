<?php
class RegnskapLagertypeInnut extends AppModel {

	var $name = 'RegnskapLagertypeInnut';
	var $useTable = 'regnskap_lagertype_innut';

	var $belongsTo = array('Regnskap', 'Lagertype', 'Kaffepris'); 
	
}
?>