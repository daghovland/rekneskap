<?php
class VaretellingerController extends AppController {

	var $name = 'Varetellinger';
	var $helpers = array('Html', 'Form', 'Session');
	var $components = array('Session');

	var $paginate = array('limit' => 100);

	function index() {
		$this->Varetelling->recursive = 0;
		$this->set('varetellinger', $this->paginate());
		$this->set('varetellingsjekk', $this->Varetelling->Varetellingsjekk->find('list'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Varetelling.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('varetelling', $this->Varetelling->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
		  $selgerInfo = $this->Auth->user();
			$this->request->data['Varetelling']['selger_id'] = $selgerInfo['nummer'];
			$this->Varetelling->create();
			if ($this->Varetelling->save($this->request->data)) {
				$this->Session->setFlash(__('The Varetelling has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Varetelling could not be saved. Please, try again.', true));
			}
		}
		$selgerData = $this->Auth->user();
                $selgerInfo = $this->Varetelling->Selger->findAllByNummer($selgerData['nummer']);
		$kaffepriser = $this->Varetelling->Kaffepris->find('list');
		$kaffelagre = $this->Varetelling->Kaffelager->find('list');
		$this->set(compact('kaffepriser', 'kaffelagre', 'selgerInfo'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Varetelling', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Varetelling->save($this->request->data)) {
				$this->Session->setFlash(__('The Varetelling has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Varetelling could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Varetelling->read(null, $id);
		}
		$kaffepriser = $this->Varetelling->Kaffepris->find('list');
		$kaffelagre = $this->Varetelling->Kaffelager->find('list');
		$this->set(compact('kaffepriser','kaffelagre'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Varetelling', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Varetelling->delete($id)) {
			$this->Session->setFlash(__('Varetelling deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
