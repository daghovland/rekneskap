<?php
class Varetellingsjekk extends AppModel {

	var $name = 'Varetellingsjekk';
	var $useTable = 'varetellingsjekk';

	var $displayField = 'antall';

	var $belongsTo = array('Varetelling'); 
	
}
?>
