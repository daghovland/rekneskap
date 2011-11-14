<?php
class RollerController extends AppController {

	var $name = 'Roller';
	var $helpers = array('Html', 'Form');

	function beforeFilter() {
	  parent::beforeFilter(); 
	  $this->Auth->allowedActions = array('*');
	}
	

	function index() {
		$this->Rolle->recursive = 0;
		$this->set('roller', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Rolle.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('rolle', $this->Rolle->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Rolle->create();
			if ($this->Rolle->save($this->request->data)) {
				$this->Session->setFlash(__('The Rolle has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Rolle could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Rolle', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Rolle->save($this->request->data)) {
				$this->Session->setFlash(__('The Rolle has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Rolle could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Rolle->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Rolle', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Rolle->del($id)) {
			$this->Session->setFlash(__('Rolle deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>