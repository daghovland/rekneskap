<?php
class RegnskapInntekter extends AppModel {

	var $name = 'RegnskapInntekter';
	var $useTable = 'regnskap_inntekter';

	var $belongsTo = array('Regnskap', 'Konto'); 
	
}
?>
