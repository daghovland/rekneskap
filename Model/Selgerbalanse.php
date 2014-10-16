<?php
class Selgerbalanse extends AppModel {
	var $name = 'Selgerbalanse';
	var $useTable = 'selgerbalanser';
	var $primaryKey = 'selger_id';
	var $belongsTo = array('Selger', 'Konto', 'Kaffelager'); 
}
?>
