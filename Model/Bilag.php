<?php
class Bilag extends AppModel {

	var $name = 'Bilag';
	var $useTable = 'bilag';
	var $displayField = 'filnavn';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array('Selger', 'Pengeflytting');
	var $hasOne = array('PengeflyttingBilag');
}
?>