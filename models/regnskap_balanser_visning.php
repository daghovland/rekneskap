<?php
class RegnskapBalanserVisning extends AppModel {

	var $name = 'RegnskapBalanserVisning';
	var $useTable = 'regnskap_balanser_visning';

	var $belongsTo = array('Regnskap', 'Konto'); 
	
}
?>
