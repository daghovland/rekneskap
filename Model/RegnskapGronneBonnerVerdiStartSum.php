<?php
class RegnskapGronneBonnerVerdiStartSum extends AppModel {

	var $name = 'RegnskapGronneBonnerVerdiStartSum';
	var $useTable = 'regnskap_gronne_bonner_verdi_start_sum';

	var $belongsTo = array('Regnskap', 'Kaffiimport'); 
	
}
?>
