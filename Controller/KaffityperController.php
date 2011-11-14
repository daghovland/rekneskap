<?php
class KaffityperController extends AppController {

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
		if (!empty($this->request->data)) {
			$this->Kaffitype->create();
			if ($this->Kaffitype->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffitype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffitype could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Kaffitype', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Kaffitype->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffitype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffitype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Kaffitype->read(null, $id);
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