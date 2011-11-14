<?php
class KaffibrenningarController extends AppController {

	var $name = 'Kaffibrenningar';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Kaffibrenning->recursive = 0;
		$this->set('kaffibrenningar', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kaffibrenning.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kaffibrenning', $this->Kaffibrenning->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Kaffibrenning->create();
			if ($this->Kaffibrenning->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffibrenning has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffibrenning could not be saved. Please, try again.', true));
			}
		}
		$kaffiimportar = $this->Kaffibrenning->Kaffiimport->find('list');
		if(isset($this->params['named']['kaffiimport']) && is_numeric($this->params['named']['kaffiimport']))
			$this->set('kaffiimport_id', $this->params['named']['kaffiimport']);
		else
			$this->set('kaffiimport_id', 0);
		$this->set(compact('kaffiimportar'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Kaffibrenning', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Kaffibrenning->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffibrenning has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffibrenning could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Kaffibrenning->read(null, $id);
		}
		$kaffiimportar = $this->Kaffibrenning->Kaffiimport->find('list');
		$this->set(compact('kaffiimportar'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffibrenning', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffibrenning->del($id)) {
			$this->Session->setFlash(__('Kaffibrenning deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
