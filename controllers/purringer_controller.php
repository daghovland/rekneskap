<?php
class PurringerController extends AppController {
    var $name = 'Purringer';

     var $helpers = array('Html', 'Form', 'Ajax', 'Javascript', 'Cache');
        var $paginate = array('limit' => 200);
        var $components = array('Acl');

	
    function index() {

    }

    function autopurr () {
	$this->Purring->autopurr();
    }
}
?>
