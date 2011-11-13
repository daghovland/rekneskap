<?php
class PengeflyttingBilag extends AppModel {

	var $name = 'PengeflyttingBilag';
	var $useTable = 'pengeflytting_bilag';
	var $displayField = 'bilag_id';
	var $primaryKey = 'bilag_id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array('Pengeflytting', 'Bilag');
}
?>
