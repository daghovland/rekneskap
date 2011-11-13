<?php
class RegnskapUtgifter extends AppModel {

	var $name = 'RegnskapUtgifter';
	var $useTable = 'regnskap_utgifter';

	var $belongsTo = array('Regnskap', 'Konto'); 
	
}
?>
