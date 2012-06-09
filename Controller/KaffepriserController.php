<?php
App::uses('AppController', 'Controller');
/**
 * Kaffepriser Controller
 *
 * @property Kaffepris $Kaffepris
 */
class KaffepriserController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Kaffepris->recursive = 0;
		$this->set('kaffepriser', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Kaffepris->id = $id;
		if (!$this->Kaffepris->exists()) {
			throw new NotFoundException(__('Invalid kaffepris'));
		}
		$this->set('kaffepris', $this->Kaffepris->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Kaffepris->create();
			if ($this->Kaffepris->save($this->request->data)) {
				$this->Session->setFlash(__('The kaffepris has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kaffepris could not be saved. Please, try again.'));
			}
		}
		$kaffibrenningar = $this->Kaffepris->Kaffibrenning->find('list');
		$kaffityper = $this->Kaffepris->Kaffitype->find('list');
		$this->set(compact('kaffibrenningar', 'kaffityper'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Kaffepris->id = $id;
		if (!$this->Kaffepris->exists()) {
			throw new NotFoundException(__('Invalid kaffepris'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kaffepris->save($this->request->data)) {
				$this->Session->setFlash(__('The kaffepris has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The kaffepris could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Kaffepris->read(null, $id);
		}
		$kaffibrenningar = $this->Kaffepris->Kaffibrenning->find('list');
		$kaffityper = $this->Kaffepris->Kaffitype->find('list');
		$this->set(compact('kaffibrenningar', 'kaffityper'));
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
		$this->Kaffepris->id = $id;
		if (!$this->Kaffepris->exists()) {
			throw new NotFoundException(__('Invalid kaffepris'));
		}
		if ($this->Kaffepris->delete()) {
			$this->Session->setFlash(__('Kaffepris deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Kaffepris was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
