<?php
class Kontotype extends AppModel {

	var $name = 'Kontotype';
	var $primaryKey = 'nummer';
	var $validate = array(
		'nummer' => array('numeric')
	);

}
?>