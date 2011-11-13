<?php
class Kontobalanse extends AppModel {

	var $name = 'Kontobalanse';
	var $useTable = 'kontobalanser';
	var $displayField = 'kroner';
	var $primaryKey = 'konto_id';
	var $belongsTo = array('Konto'); 
	
}
?>