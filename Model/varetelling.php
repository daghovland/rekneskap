<?php
class Varetelling extends AppModel {

	var $name = 'Varetelling';
	var $useTable = 'varetelling';


	var $belongsTo = array('Kaffepris', 'Kaffelager', 'Selger');


	var $hasOne = array('Varetellingsjekk');
}
?>
