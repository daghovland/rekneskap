<?php
class KaffiinnkjopController extends AppController {

	var $name = 'Kaffiinnkjop';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Kaffiinnkjop->recursive = 0;
		$this->set('kaffiinnkjop', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kaffiinnkjop.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kaffiinnkjop', $this->Kaffiinnkjop->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Kaffiinnkjop->create();
			if ($this->Kaffiinnkjop->save($this->data)) {
				$this->Session->setFlash(__('The Kaffiinnkjop has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffiinnkjop could not be saved. Please, try again.', true));
			}
		}
		$kaffibrenningar = $this->Kaffiinnkjop->Kaffibrenning->find('list');
		$kaffityper = $this->Kaffiinnkjop->Kaffitype->find('list');
		$pengeflyttinger = $this->Kaffiinnkjop->Pengeflytting->find('list');
		$kaffeflyttinger = $this->Kaffiinnkjop->Kaffeflytting->find('list');
		$this->set(compact('kaffibrenningar', 'kaffityper', 'pengeflyttinger', 'kaffeflyttinger'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Kaffiinnkjop', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Kaffiinnkjop->save($this->data)) {
				$this->Session->setFlash(__('The Kaffiinnkjop has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffiinnkjop could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Kaffiinnkjop->read(null, $id);
		}
		$kaffibrenningar = $this->Kaffiinnkjop->Kaffibrenning->find('list');
		$kaffityper = $this->Kaffiinnkjop->Kaffitype->find('list');
		$pengeflyttinger = $this->Kaffiinnkjop->Pengeflytting->find('list');
		$kaffeflyttinger = $this->Kaffiinnkjop->Kaffeflytting->find('list');
		$this->set(compact('kaffibrenningar','kaffityper','pengeflyttinger','kaffeflyttinger'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffiinnkjop', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffiinnkjop->del($id)) {
			$this->Session->setFlash(__('Kaffiinnkjop deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
