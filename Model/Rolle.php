<?php
class Rolle extends AppModel {
  var $actsAs = array('Acl' => array('requester'));
  
  function parentNode() {
    return null;
  }
  
  var $name = 'Rolle';
  var $primaryKey = 'nummer';
  var $validate = array(
			'nummer' => array('numeric')
			);
  
  }
?>