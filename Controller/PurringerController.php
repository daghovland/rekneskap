<?php
App::uses('AppController', 'Controller');
/**
 * Purringer Controller
 *
 * @property Purring $Purring
 */
class PurringerController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Purring->recursive = 0;
		$this->set('purringer', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Purring->id = $id;
		if (!$this->Purring->exists()) {
			throw new NotFoundException(__('Invalid purring'));
		}
		$this->set('purring', $this->Purring->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Purring->create();
			if ($this->Purring->save($this->request->data)) {
				$this->Session->setFlash(__('The purring has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purring could not be saved. Please, try again.'));
			}
		}
		$fakturaer = $this->Purring->Faktura->find('list');
		$this->set(compact('fakturaer'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Purring->id = $id;
		if (!$this->Purring->exists()) {
			throw new NotFoundException(__('Invalid purring'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Purring->save($this->request->data)) {
				$this->Session->setFlash(__('The purring has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purring could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Purring->read(null, $id);
		}
		$fakturaer = $this->Purring->Faktura->find('list');
		$this->set(compact('fakturaer'));
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
		$this->Purring->id = $id;
		if (!$this->Purring->exists()) {
			throw new NotFoundException(__('Invalid purring'));
		}
		if ($this->Purring->delete()) {
			$this->Session->setFlash(__('Purring deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purring was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
