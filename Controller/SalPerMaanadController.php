<?php
class SalPerMaanadController extends AppController {

	var $name = 'SalPerMaanad';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->set('kaffepriser', $this->SalPerMaanad->Kaffepris->find('all', array('order' => 'nummer')));
		$this->set('salPerMaanad', $this->SalPerMaanad->find('all', array('order' => array('year' => 'DESC', 'month' => 'DESC', 'kaffepris_id'))));
		$this->set('maanader', array('Januar', 'Februar', 'Mars', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Desember'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid SalPerMaanad.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('salPerMaanad', $this->SalPerMaanad->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->SalPerMaanad->create();
			if ($this->SalPerMaanad->save($this->request->data)) {
				$this->Session->setFlash(__('The SalPerMaanad has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The SalPerMaanad could not be saved. Please, try again.', true));
			}
		}
		$kaffepriser = $this->SalPerMaanad->Kaffepri->find('list');
		$this->set(compact('kaffepriser'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid SalPerMaanad', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->SalPerMaanad->save($this->request->data)) {
				$this->Session->setFlash(__('The SalPerMaanad has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The SalPerMaanad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->SalPerMaanad->read(null, $id);
		}
		$kaffepriser = $this->SalPerMaanad->Kaffepri->find('list');
		$this->set(compact('kaffepriser'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for SalPerMaanad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SalPerMaanad->del($id)) {
			$this->Session->setFlash(__('SalPerMaanad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
