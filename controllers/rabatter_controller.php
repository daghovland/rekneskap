<?php
class RabatterController extends AppController {

	var $name = 'Rabatter';
	var $helpers = array('Html', 'Form');
	var $components = array('Acl');

	function index() {
		$this->Rabatt->recursive = 0;
		$this->set('rabatter', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Rabatt.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('rabatt', $this->Rabatt->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Rabatt->create();
			if ($this->Rabatt->save($this->data)) {
				$this->Session->setFlash(__('The Rabatt has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Rabatt could not be saved. Please, try again.', true));
			}
		}
		$kaffepriser = $this->Rabatt->Kaffepris->find('list');
		$this->set(compact('kaffepriser'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Rabatt', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Rabatt->save($this->data)) {
				$this->Session->setFlash(__('The Rabatt has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Rabatt could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rabatt->read(null, $id);
		}
		$kaffepriser = $this->Rabatt->Kaffepris->find('list');
		$this->set(compact('kaffepriser'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Rabatt', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Rabatt->del($id)) {
			$this->Session->setFlash(__('Rabatt deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
