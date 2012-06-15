<?php
App::import('Sanitize');
class KaffelagreController extends AppController {

	var $name = 'Kaffelagre';
	var $helpers = array('Js' => array('Prototype'),'Html', 'Form',   'Cache');
	var $cacheAction = array(
		'view/' => 21600
	);

	var $components = array('Acl', 'RequestHandler');

	public $paginate = array(
		'lagerfraflytting' => array(
			'limit' => 300,
			'order' => array(
				'lagerfraflytting.dato' => 'desc'
			)
		)
	);
	
	function index() {
		$this->Kaffelager->recursive = 0;
		$this->set('kaffelagre', $this->paginate());
	}
	function beholdninger() {
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
	  $lager_id = $this->request->data['lager'];
	  $type_id = $this->request->data['type'];
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
		if (!empty($this->request->data)) {
			$this->Kaffelager->create();
			if ($this->Kaffelager->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffelager has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffelager could not be saved. Please, try again.', true));
			}
		}
		$selgere = $this->Kaffelager->Selger->find('list', array('fields' => 'navn'));
		$lagertyper = $this->Kaffelager->lagertypenavn->find('list');
		$this->set(compact('selgere', 'lagertyper'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Kaffelager', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Kaffelager->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffelager has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffelager could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Kaffelager->read(null, $id);
		}
		$selgere = $this->Kaffelager->Selger->find('list');
		$lagertyper = $this->Kaffelager->lagertypenavn->find('list');
		$kontoer = $this->Kaffelager->lagerkonto->find('list');
		$this->set(compact('selgere', 'kontoer', 'lagertyper'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffelager', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffelager->delete($id)) {
			$this->Session->setFlash(__('Kaffelager deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
