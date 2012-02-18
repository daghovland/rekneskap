<?php
class LagertyperController extends AppController {

	var $name = 'Lagertyper';
	var $helpers = array('Html', 'Form');
	var $components = array('Acl');

	var $uses = array('Kaffeflytting', 'Lagertype', 'Kaffelager');

	function index() {
		$this->Lagertype->recursive = 0;
		$this->set('lagertyper', $this->paginate());
	}

	function view($id = null) {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Invalid Lagertype.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lagertype', $this->Lagertype->read(null, $id));
		$this->set('kaffelagre', $this->Kaffelager->find('all'));
		$lagerflyttinger = $this->paginate('Kaffeflytting', 'Kaffeflytting.fralagertype = ' . $id . ' or Kaffeflytting.tillagertype = ' . $id);
		$this->set('lagerflyttinger', $lagerflyttinger);

	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Lagertype->create();
			if ($this->Lagertype->save($this->request->data)) {
				$this->Session->setFlash(__('The Lagertype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagertype could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Lagertype', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Lagertype->save($this->request->data)) {
				$this->Session->setFlash(__('The Lagertype has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagertype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Lagertype->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Lagertype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lagertype->del($id)) {
			$this->Session->setFlash(__('Lagertype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
