<?php
class KontotyperController extends AppController {

	var $name = 'Kontotyper';
	var $helpers = array('Html', 'Form');
	var $components = array('Acl');

	function index() {
		$this->Kontotype->recursive = 0;
		$this->set('kontotyper', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kontotype.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kontotype', $this->Kontotype->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Kontotype->create();
			if ($this->Kontotype->save($this->request->data)) {
				$this->Session->setFlash(__('The Kontotype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kontotype could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Kontotype', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Kontotype->save($this->request->data)) {
				$this->Session->setFlash(__('The Kontotype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kontotype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Kontotype->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kontotype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kontotype->del($id)) {
			$this->Session->setFlash(__('Kontotype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>