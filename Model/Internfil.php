<?php
class Internfil extends AppModel {

	var $name = 'Internfil';
	var $useTable = 'intern_filer';
	var $displayField = 'filnavn';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array('Selger');
}
?>
