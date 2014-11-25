<?php
App::uses('AppController', 'Controller');
/**
 * Innstillingar Controller
 *
 * @property Innstilling $Innstilling
 */
class InnstillingarController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Innstilling->recursive = 0;
		$this->set('innstillingar', $this->paginate());
		$kontoer = $this->Innstilling->Fraktutgift->find('list');
		$kaffelagre = $this->Innstilling->StandardLager->find('list');
		$this->set('kontoer', $kontoer);
		$this->set('kaffelagre', $kaffelagre);
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Innstilling->create();
			if ($this->Innstilling->save($this->request->data)) {
				$this->Session->setFlash(__('The innstilling has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The innstilling could not be saved. Please, try again.'));
			}
		} else {
		  $kontoer = $this->Innstilling->Fraktutgift->find('list');
		  $kaffelagre = $this->Innstilling->StandardLager->find('list');
		  $this->set('kontoer', $kontoer);
		  $this->set('kaffelagre', $kaffelagre);
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Innstilling->id = $id;
		if (!$this->Innstilling->exists()) {
			throw new NotFoundException(__('Invalid innstilling'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Innstilling->save($this->request->data)) {
				$this->Session->setFlash(__('The innstilling has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The innstilling could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Innstilling->read(null, $id);
			$kontoer = $this->Innstilling->Fraktutgift->find('list');
			$kaffelagre = $this->Innstilling->StandardLager->find('list');
			$this->set('kontoer', $kontoer);
			$this->set('kaffelagre', $kaffelagre);
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
		$this->Innstilling->id = $id;
		if (!$this->Innstilling->exists()) {
			throw new NotFoundException(__('Invalid innstilling'));
		}
		if ($this->Innstilling->delete()) {
			$this->Session->setFlash(__('Innstilling deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Innstilling was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
