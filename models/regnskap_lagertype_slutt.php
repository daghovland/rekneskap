<?php
class RegnskapLagertypeSlutt extends AppModel {

	var $name = 'RegnskapLagertypeSlutt';
	var $useTable = 'regnskap_lagertype_slutt';

	var $belongsTo = array('Regnskap', 'Lagertype', 'Kaffepris'); 
	
}
?>