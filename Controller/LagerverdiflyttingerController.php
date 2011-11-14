<?php
class LagerverdiflyttingerController extends AppController {

	var $name = 'Lagerverdiflyttinger';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Lagerverdiflytting->recursive = 0;
		$this->set('lagerverdiflyttinger', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Lagerverdiflytting.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('lagerverdiflytting', $this->Lagerverdiflytting->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Lagerverdiflytting->create();
			if ($this->Lagerverdiflytting->save($this->request->data)) {
				$this->Session->setFlash(__('The Lagerverdiflytting has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagerverdiflytting could not be saved. Please, try again.', true));
			}
		}
		$pengeflyttinger = $this->Lagerverdiflytting->Pengeflytting->find('list');
		$kaffeflyttinger = $this->Lagerverdiflytting->Kaffeflytting->find('list');
		$kaffiimportar = $this->Lagerverdiflytting->Kaffiimport->find('list');
		$kaffesalg = $this->Lagerverdiflytting->Kaffesalg->find('list');
		$lagerverdikontoer = $this->Lagerverdiflytting->Frakonto->find('list');
		$this->set(compact('pengeflyttinger', 'kaffeflyttinger', 'kaffiimportar', 'kaffesalg', 'lagerverdikontoer'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Lagerverdiflytting', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Lagerverdiflytting->save($this->request->data)) {
				$this->Session->setFlash(__('The Lagerverdiflytting has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Lagerverdiflytting could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Lagerverdiflytting->read(null, $id);
		}
		$pengeflyttinger = $this->Lagerverdiflytting->Pengeflytting->find('list');
		$kaffeflyttinger = $this->Lagerverdiflytting->Kaffeflytting->find('list');
		$kaffiimportar = $this->Lagerverdiflytting->Kaffiimport->find('list');
		$kaffesalg = $this->Lagerverdiflytting->Kaffesalg->find('list');
		$lagerverdikontoer = $this->Lagerverdiflytting->Frakonto->find('list');
		$this->set(compact('pengeflyttinger', 'kaffeflyttinger', 'kaffiimportar', 'kaffesalg', 'lagerverdikontoer'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Lagerverdiflytting', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lagerverdiflytting->del($id)) {
			$this->Session->setFlash(__('Lagerverdiflytting deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
