<?php
App::uses('AppController', 'Controller');
/**
 * Tingingar Controller
 *
 * @property Tinging $Tinging
 */
class TingingarController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tinging->recursive = 0;
		$this->set('tingingar', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tinging->id = $id;
		if (!$this->Tinging->exists()) {
			throw new NotFoundException(__('Invalid tinging'));
		}
		$this->set('tinging', $this->Tinging->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tinging->create();
			if ($this->Tinging->save($this->request->data)) {
				$this->Session->setFlash(__('The tinging has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tinging could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Tinging->id = $id;
		if (!$this->Tinging->exists()) {
			throw new NotFoundException(__('Invalid tinging'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tinging->save($this->request->data)) {
				$this->Session->setFlash(__('The tinging has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tinging could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tinging->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Tinging->id = $id;
		if (!$this->Tinging->exists()) {
			throw new NotFoundException(__('Invalid tinging'));
		}
		if ($this->Tinging->delete()) {
			$this->Session->setFlash(__('Tinging deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tinging was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}