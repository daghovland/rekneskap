<?php
class PengetellingarController extends AppController {

	var $name = 'Pengetellingar';
	var $helpers = array('Html', 'Form', 'Session');
	var $components = array('Session');

	var $paginate = array('limit' => 100);

	function index() {
		$this->Pengetelling->recursive = 0;
		$this->set('pengetellingar', $this->paginate());
		$this->set('pengetellingsjekkkroner', $this->Pengetelling->Pengetellingsjekk->find('list', array('fields' => array('id', 'kroner'), 'order' => 'Pengetellingsjekk.id')));
		$this->set('pengetellingsjekkoere', $this->Pengetelling->Pengetellingsjekk->find('list', array('fields' => array('id', 'oere'), 'order' => 'Pengetellingsjekk.id')));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ugyldig pengetelling.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('pengetelling', $this->Pengetelling->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
		  $selgerInfo = $this->Auth->user();
			$this->request->data['Pengetelling']['selger_id'] = $selgerInfo['nummer'];
			$this->Pengetelling->create();
			if ($this->Pengetelling->save($this->request->data)) {
				$this->Session->setFlash(__('Pengetellinga er lagra', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Varetelling could not be saved. Please, try again.', true));
			}
		}
		$kontoer = $this->Pengetelling->Konto->find('list');
		$this->set(compact('kontoer'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Ugyldig pengetelling', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Pengetelling->save($this->request->data)) {
				$this->Session->setFlash(__('Pengetellinga er lagra', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Pengetelling could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Pengetelling->read(null, $id);
		}
		$kontoer = $this->Pengetelling->Konto->find('list');
		$this->set(compact('kontoer'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ugyldig pengetelling', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pengetelling->del($id)) {
			$this->Session->setFlash(__('Sletta pengetelling', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
