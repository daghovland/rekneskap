<?php
class BudsjettPengeflyttingerController extends AppController {

	var $name = 'BudsjettPengeflyttinger';

	function index() {
		$this->BudsjettPengeflytting->recursive = 0;
		$this->set('budsjettPengeflyttinger', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid budsjett pengeflytting', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('budsjettPengeflytting', $this->BudsjettPengeflytting->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->BudsjettPengeflytting->create();
			if ($this->BudsjettPengeflytting->save($this->request->data)) {
				$this->Session->setFlash(__('The budsjett pengeflytting has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The budsjett pengeflytting could not be saved. Please, try again.', true));
			}
		}
		if(isset($this->params['named']['kaffiimport']) && is_numeric($this->params['named']['kaffiimport']))
                        $this->set('kaffiimport_id', $this->params['named']['kaffiimport']);
                else
                        $this->set('kaffiimport_id', 0);
		if(isset($this->params['named']['kaffibrenning']) && is_numeric($this->params['named']['kaffibrenning']))
                        $this->set('kaffibrenning_id', $this->params['named']['kaffibrenning']);
                else
                        $this->set('kaffibrenning_id', 0);
		$kaffiimportar = $this->BudsjettPengeflytting->Kaffiimport->find('list');
		$kaffibrenningar = $this->BudsjettPengeflytting->Kaffibrenning->find('list');
		$tilkontoer = $this->BudsjettPengeflytting->TilKonto->find('list');
		$frakontoer = $this->BudsjettPengeflytting->FraKonto->find('list');
		$this->set(compact('kaffiimportar', 'kaffibrenningar', 'tilkontoer', 'frakontoer'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid budsjett pengeflytting', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->BudsjettPengeflytting->save($this->request->data)) {
				$this->Session->setFlash(__('The budsjett pengeflytting has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The budsjett pengeflytting could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->BudsjettPengeflytting->read(null, $id);
		}
		$kaffiimportar = $this->BudsjettPengeflytting->Kaffiimport->find('list');
		$kaffibrenningar = $this->BudsjettPengeflytting->Kaffibrenning->find('list');
		$tilkontoer = $this->BudsjettPengeflytting->TilKonto->find('list');
		$frakontoer = $this->BudsjettPengeflytting->FraKonto->find('list');
		$this->set(compact('kaffiimportar', 'kaffibrenningar', 'tilkontoer', 'frakontoer'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for budsjett pengeflytting', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BudsjettPengeflytting->delete($id)) {
			$this->Session->setFlash(__('Budsjett pengeflytting deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Budsjett pengeflytting was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
