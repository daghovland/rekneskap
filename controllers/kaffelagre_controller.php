<?php
App::import('Sanitize');
class KaffelagreController extends AppController {

	var $name = 'Kaffelagre';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript', 'Cache');
	var $cacheAction = array(
		'view/' => 21600
	);

	var $components = array('Acl', 'RequestHandler');

	var $paginate = array(
		'lagerfraflytting' => array(
			'limit' => 300,
			'order' => array(
				'lagerfraflytting.dato' => 'desc'
			)
		)
	);
	

	function index() {
		$this->Kaffelager->recursive = 0;
		$this->set('beholdninger', $this->Kaffelager->Kaffelagerbeholdning->find('all', array('order' => array('kaffelager_id ASC', 'kaffepris_id ASC'), 'conditions' => array('lagertype_id' => 3))));
		$this->set('kaffelagre', $this->Kaffelager->find('all', array('conditions' => array('Kaffelager.lagertype' => 3), 'order' => array('Kaffelager.nummer ASC'))));
		$this->set('kaffetyper', $this->Kaffelager->lagerfraflytting->Kaffepris->find('all', array('order' => array('nummer ASC'))));
		$this->Session->write('forrigeSide', array('controller' => 'kaffelagre', 'action' => 'index'));
		
		if(isset($this->params['named']['dato']) 
		   && preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $this->params['named']['dato']))
		  $this->set('beholdninger', $this->Kaffelager->lagerBeholdninger($this->params['named']['dato']));
		else
		$this->set('lageransvarlige', $this->Kaffelager->Selger->find('all'));
	}

	/*
		Kalles som ajax fra hent_kaffi i kaffeflyttinger
	*/
	function lager_type_beholdning(){
		$this->layout = 'ajax';
		$lager_id = $this->params['form']['lager'];
		$type_id = $this->params['form']['type'];
		if(is_numeric($lager_id) && is_numeric($type_id)){
		  $beholdning = $this->Kaffelager->Kaffelagerbeholdning->find('first', array('conditions' => array(
														   'kaffelager_id' => $lager_id,
														   'kaffepris_id' => $type_id,
														   'lagertype_id' => 3)));
		    //		$beholdning = $this->Kaffelager->lager_type_beholdning($this->params['form']['lager'], $this->params['form']['type']);
		    $this->set('beholdning', $beholdning['Kaffelagerbeholdning']['antall']);
		  }
	}

	function view($id = null, $sort = 'dato') {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Ugyldig Kaffelager.', true));
			$this->redirect(array('action'=>'index'));
		}
		$lagerflyttinger = $this->paginate('Kaffelager.lagerfraflytting', 'lagerfraflytting.til = ' . $id . ' or lagerfraflytting.fra = ' . $id);	
		$this->set('lagerflyttinger', $lagerflyttinger);
		$this->set('beholdninger', $this->Kaffelager->Kaffelagerbeholdning->findAllByKaffelagerId($id));
		$this->set('kaffelager', $this->Kaffelager->read(null, $id));
		$this->set('kaffelagre', $this->Kaffelager->find('list'));
		$this->set('ansvarlige', $this->Kaffelager->find('list'));
		$this->set('kaffetyper', $this->Kaffelager->lagerfraflytting->Kaffepris->find('list'));
		$this->set('kaffelagertyper', $this->Kaffelager->lagertypenavn->find('list'));
		$this->Session->write('forrigeSide', array('controller' => 'kaffelagre', 'action' => 'view', $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Kaffelager->create();
			if ($this->Kaffelager->save($this->data)) {
				$this->Session->setFlash(__('The Kaffelager has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffelager could not be saved. Please, try again.', true));
			}
		}
		$selgere = $this->Kaffelager->Selger->find('list');
		$this->set(compact('selgere'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Kaffelager', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Kaffelager->save($this->data)) {
				$this->Session->setFlash(__('The Kaffelager has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffelager could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Kaffelager->read(null, $id);
		}
		$selgere = $this->Kaffelager->Selger->find('list');
		$this->set(compact('selgere'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffelager', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffelager->del($id)) {
			$this->Session->setFlash(__('Kaffelager deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
