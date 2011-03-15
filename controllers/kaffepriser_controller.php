<?php
class KaffepriserController extends AppController {

	var $name = 'Kaffepriser';
	var $helpers = array('Html', 'Form');
	var $components = array('Acl');

	function index() {
		$this->Kaffepris->recursive = 0;
		$this->set('kaffepriser', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kaffepris.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kaffepris', $this->Kaffepris->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Kaffepris->create();
			if ($this->Kaffepris->save($this->data)) {
				$this->Session->setFlash(__('The Kaffepris has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffepris could not be saved. Please, try again.', true));
			}
		}
		$this->set('kaffibrenningar', $this->Kaffepris->Kaffibrenning->find('list'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Kaffepris', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Kaffepris->save($this->data)) {
				$this->Session->setFlash(__('The Kaffepris has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffepris could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Kaffepris->read(null, $id);
			$this->set('kaffibrenningar', $this->Kaffepris->Kaffibrenning->find('list'));
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffepris', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffepris->del($id)) {
			$this->Session->setFlash(__('Kaffepris deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
