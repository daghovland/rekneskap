<?php
class KontoutskrifterController extends AppController {

	var $name = 'Kontoutskrifter';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Kontoutskrift->recursive = 0;
		$this->set('kontoutskrifter', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kontoutskrift.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kontoutskrift', $this->Kontoutskrift->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Kontoutskrift->create();
			if ($this->Kontoutskrift->save($this->data)) {
				$this->Session->setFlash(__('The Kontoutskrift has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kontoutskrift could not be saved. Please, try again.', true));
			}
		}
		$kontoer = $this->Kontoutskrift->Konto->find('list');
		$this->set(compact('kontoer'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Kontoutskrift', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Kontoutskrift->save($this->data)) {
				$this->Session->setFlash(__('The Kontoutskrift has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kontoutskrift could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Kontoutskrift->read(null, $id);
		}
		$kontoer = $this->Kontoutskrift->Konto->find('list');
		$this->set(compact('kontoer'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kontoutskrift', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kontoutskrift->del($id)) {
			$this->Session->setFlash(__('Kontoutskrift deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>