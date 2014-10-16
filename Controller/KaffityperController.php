<?php
App::uses('AppController', 'Controller');
/**
 * Kaffityper Controller
 *
 * @property Kaffitype $Kaffitype
 */
class KaffityperController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Kaffitype->recursive = 0;
		$this->set('kaffityper', $this->paginate());
		$this->set('kaffepriser', $this->Kaffitype->Kaffepris->find('list'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Kaffitype->id = $id;
		if (!$this->Kaffitype->exists()) {
			throw new NotFoundException(__('Invalid kaffitype'));
		}	
		$standardKaffepris = $this->Kaffitype->StandardKaffepris->find('list');
		$kaffitype = $this->Kaffitype->read(null, $id);
		$this->set(compact('kaffitype', 'standardKaffepris'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Kaffitype->create();
			if ($this->Kaffitype->save($this->request->data)) {
				$this->Session->setFlash(__('The kaffitype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kaffitype could not be saved. Please, try again.'));
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
		$this->Kaffitype->id = $id;
		if (!$this->Kaffitype->exists()) {
			throw new NotFoundException(__('Invalid kaffitype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kaffitype->save($this->request->data)) {
				$this->Session->setFlash(__('The kaffitype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kaffitype could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Kaffitype->read(null, $id);
		}
		$standardKaffepris = $this->Kaffitype->StandardKaffepris->find('list', array('conditions' => array('StandardKaffepris.kaffitype_id' => $id)));
		$this->set(compact('standardKaffepris'));
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
		$this->Kaffitype->id = $id;
		if (!$this->Kaffitype->exists()) {
			throw new NotFoundException(__('Invalid kaffitype'));
		}
		if ($this->Kaffitype->delete()) {
			$this->Session->setFlash(__('Kaffitype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Kaffitype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
