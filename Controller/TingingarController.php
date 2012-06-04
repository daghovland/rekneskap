<?php
App::uses('AppController', 'Controller');
/**
 * Tingingar Controller
 *
 * @property Tinging $Tinging
 */
class TingingarController extends AppController {
  
  /*
    Sida vert nytta fra REST og difor treng Basic authentication
    Dette virker førebels ikkje
  */  
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add');
  }
  public function login(){
    if ($this->Auth->login()) {
      return $this->redirect($this->Auth->redirect());
    } else {
      $this->Session->setFlash("Ugyldig passord eller brukarnamn", 'default', array(), 'auth');
    }
  }
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

	public function start_xmlrpc_server(){
	  xmlrpc_server_create();
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
