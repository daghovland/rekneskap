<?php
class SplitttransaksjonerController extends AppController {

	var $name = 'Splitttransaksjoner';

	function index() {
		$this->Splitttransaksjon->recursive = 0;
		$this->set('splitttransaksjoner', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid splitttransaksjon', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('splitttransaksjon', $this->Splitttransaksjon->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Splitttransaksjon->create();
			if ($this->Splitttransaksjon->save($this->data)) {
				$this->Session->setFlash(__('The splitttransaksjon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The splitttransaksjon could not be saved. Please, try again.', true));
			}
		}
		$selgere = $this->Splitttransaksjon->Selg->find('list');
		$this->set(compact('selgere'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid splitttransaksjon', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Splitttransaksjon->save($this->data)) {
				$this->Session->setFlash(__('The splitttransaksjon has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The splitttransaksjon could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Splitttransaksjon->read(null, $id);
		}
		$selgere = $this->Splitttransaksjon->Selg->find('list');
		$this->set(compact('selgere'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for splitttransaksjon', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Splitttransaksjon->delete($id)) {
			$this->Session->setFlash(__('Splitttransaksjon deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Splitttransaksjon was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>