<?php
class StartsaldoerController extends AppController {

	var $helpers = array('Html', 'Form');
	var $components = array('Acl');
	var $modelClass = 'Startsaldo';

	function index() {
		$this->Startsaldo->recursive = 0;
		$this->set('startsaldoer', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Startsaldo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('startsaldo', $this->Startsaldo->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Startsaldo->create();
			if ($this->Startsaldo->save($this->request->data)) {
				$this->Session->setFlash(__('The Startsaldo has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Startsaldo could not be saved. Please, try again.', true));
			}
		}
		$regnskap = $this->Startsaldo->Regnskap->find('list');
		$kontoer = $this->Startsaldo->Konto->find('list');
		$this->set(compact('regnskap', 'kontoer'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Startsaldo', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Startsaldo->save($this->request->data)) {
				$this->Session->setFlash(__('The Startsaldo has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Startsaldo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Startsaldo->read(null, $id);
		}
		$regnskap = $this->Startsaldo->Regnskap->find('list');
		$kontoer = $this->Startsaldo->Konto->find('list');
		$this->set(compact('regnskap','kontoer'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Startsaldo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Startsaldo->del($id)) {
			$this->Session->setFlash(__('Startsaldo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
