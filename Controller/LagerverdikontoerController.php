<?php
class LagerverdikontoerController extends AppController {

	var $name = 'Lagerverdikontoer';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Lagerverdikonto->recursive = 0;
		$this->set('lagerverdikontoer', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Lagerverdikonto.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lagerverdikonto', $this->Lagerverdikonto->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Lagerverdikonto->create();
			if ($this->Lagerverdikonto->save($this->request->data)) {
				$this->Session->setFlash(__('The Lagerverdikonto has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagerverdikonto could not be saved. Please, try again.', true));
			}
		}
		$lagerverdityper = $this->Lagerverdikonto->Lagerverditype->find('list');
		$this->set(compact('lagerverdityper'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Lagerverdikonto', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Lagerverdikonto->save($this->request->data)) {
				$this->Session->setFlash(__('The Lagerverdikonto has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagerverdikonto could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Lagerverdikonto->read(null, $id);
		}
		$lagerverdityper = $this->Lagerverdikonto->Lagerverditype->find('list');
		$this->set(compact('lagerverdityper'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Lagerverdikonto', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lagerverdikonto->del($id)) {
			$this->Session->setFlash(__('Lagerverdikonto deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>