<?php
class Kaffelagerbeholdning extends AppModel {

	var $name = 'Kaffelagerbeholdning';
	var $useTable = 'kaffelagerbeholdninger';

	var $belongsTo = array('Kaffelager', 'Lagertype', 'Kaffepris'); 
	
}
?>