<?php
class PostsendingarController extends AppController {

	var $name = 'Postsendingar';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Postsending->recursive = 0;
		$this->set('postsendingar', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Postsending.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('postsending', $this->Postsending->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Postsending->create();
			if ($this->Postsending->save($this->data)) {
				$this->Session->setFlash(__('The Postsending has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Postsending could not be saved. Please, try again.', true));
			}
		}
		$kaffesalg = $this->Postsending->Kaffesalg->find('list');
		$kundeBetalings = $this->Postsending->KundeBetaling->find('list');
		$fraktBetalings = $this->Postsending->FraktBetaling->find('list');
		$this->set(compact('kaffesalg', 'kundeBetalings', 'fraktBetalings'));
		if(isset($this->params['named']['kaffesalg']) && is_numeric($this->params['named']['kaffesalg']))
		   $this->set('kaffesalg_id', $this->params['named']['kaffesalg']);
}



	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Postsending', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Postsending->save($this->data)) {
				$this->Session->setFlash(__('The Postsending has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Postsending could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Postsending->read(null, $id);
		}
		$kaffesalg = $this->Postsending->Kaffesalg->find('list');
		$kundeBetalings = $this->Postsending->KundeBetaling->find('list');
		$fraktBetalings = $this->Postsending->FraktBetaling->find('list');
		$this->set(compact('kaffesalg','kundeBetalings','fraktBetalings'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Postsending', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Postsending->del($id)) {
			$this->Session->setFlash(__('Postsending deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>