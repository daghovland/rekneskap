<?php
class LagerverdityperController extends AppController {

	var $name = 'Lagerverdityper';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Lagerverditype->recursive = 0;
		$this->set('lagerverdityper', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Lagerverditype.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lagerverditype', $this->Lagerverditype->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Lagerverditype->create();
			if ($this->Lagerverditype->save($this->data)) {
				$this->Session->setFlash(__('The Lagerverditype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagerverditype could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Lagerverditype', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Lagerverditype->save($this->data)) {
				$this->Session->setFlash(__('The Lagerverditype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagerverditype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Lagerverditype->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Lagerverditype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lagerverditype->del($id)) {
			$this->Session->setFlash(__('Lagerverditype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>