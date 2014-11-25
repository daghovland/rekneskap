<?php
class AdresserController extends AppController {

	var $name = 'Adresser';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript', 'Cache');
	var $components = array('Acl', 'RequestHandler');
	var $cache = array('index');

	function index() {
		$this->Adresse->recursive = 0;
		$this->set('adresser', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Adresse.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('adresse', $this->Adresse->read(null, $id));
	}

	function etikett($id) {
	  $this->layout = 'ajax';
	  $this->set('adresse', $this->Adresse->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Adresse->create();
			if ($this->Adresse->save($this->request->data)) {
				$this->Session->setFlash(__('Den nye adressa er lagra', true));
				if($this->Session->check('forrigeSide')){
					$side = $this->Session->read('forrigeSide');
					$this->Session->delete('forrigeSide');
					$this->redirect($side);
				} else {
					$this->redirect(array('action'=>'index'));
				}
			} else {
				$this->Session->setFlash(__('The Adresse could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Ugyldig adresse', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Adresse->save($this->request->data)) {
				$this->Session->setFlash(__('Adressa er lagra', true));
				if($this->Session->check('forrigeSide')){
                                        $side = $this->Session->read('forrigeSide');
                                        $this->Session->delete('forrigeSide');
                                        $this->redirect($side);
                                } else {
					$this->redirect(array('action'=>'index'));
				}
			} else {
				$this->Session->setFlash(__('Kunne ikkje lagre adressa. Prøv igjen.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Adresse->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Adresse', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Adresse->del($id)) {
			$this->Session->setFlash(__('Adresse deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Adresse->recursive = 0;
		$this->set('adresser', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Adresse.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('adresse', $this->Adresse->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Adresse->create();
			if ($this->Adresse->save($this->request->data)) {
				$this->Session->setFlash(__('The Adresse has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Adresse could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Adresse', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Adresse->save($this->request->data)) {
				$this->Session->setFlash(__('The Adresse has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Adresse could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Adresse->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Adresse', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Adresse->del($id)) {
			$this->Session->setFlash(__('Adresse deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
