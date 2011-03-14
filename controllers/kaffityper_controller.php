<?php
class KaffityperController extends AppController {

	var $name = 'Kaffityper';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Kaffitype->recursive = 0;
		$this->set('kaffityper', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kaffitype.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kaffitype', $this->Kaffitype->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Kaffitype->create();
			if ($this->Kaffitype->save($this->data)) {
				$this->Session->setFlash(__('The Kaffitype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffitype could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Kaffitype', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Kaffitype->save($this->data)) {
				$this->Session->setFlash(__('The Kaffitype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffitype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Kaffitype->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffitype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffitype->del($id)) {
			$this->Session->setFlash(__('Kaffitype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>