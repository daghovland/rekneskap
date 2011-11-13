<?php
class KaffelagerbeholdningerController extends AppController {

	var $name = 'Kaffelagerbeholdninger';
	var $model = 'Kaffelagerbeholdning';
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Cache');

	var $cacheAction = array(
		'view/' => 36000
	);
	var $paginate = array('limit' => 200);
	var $components = array('Acl', 'RequestHandler');

	function index() {
	  $this->set('beholdninger', $this->Kaffelagerbeholdning->find('all', array('order' => array('Kaffelagerbeholdning.kaffelager_id ASC', 'Kaffelagerbeholdning.kaffepris_id ASC'), 'conditions' => array('Kaffelagerbeholdning.lagertype_id' => 3))));
	  $this->set('kaffelagre', $this->Kaffelagerbeholdning->Kaffelager->find('all', array('order' => 'Kaffelager.nummer ASC')));
	  $this->set('kaffetyper', $this->Kaffelagerbeholdning->Kaffepris->find('all', array('order' => 'Kaffepris.nummer ASC')));
	  $this->set('balanser', $this->Kaffelagerbeholdning->Kaffelager->lagerkonto->Kontobalanse->findAllByKonto());
	  $this->set('lagerkontoer', $this->Kaffelagerbeholdning->Kaffelager->find('list', array('fields' => array('konto'))));
	}
}
?>