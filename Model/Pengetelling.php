<?php
class Pengetelling extends AppModel {

	var $name = 'Pengetelling';
	var $useTable = 'pengetellingar';


	var $belongsTo = array('Konto', 'Selger');


	var $hasOne = array('Pengetellingsjekk');
}
?>
