<?php
class RegnskapGronneBonnerVerdiSluttSum extends AppModel {

	var $name = 'RegnskapGronneBonnerVerdiSluttSum';
	var $useTable = 'regnskap_gronne_bonner_verdi_slutt_sum';

	var $belongsTo = array('Regnskap', 'Kaffiimport'); 
	
}
?>
