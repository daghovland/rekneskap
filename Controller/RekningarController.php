<?php
App::uses('AppController', 'Controller');
/**
 * Rekningar Controller
 *
 * @property Rekning $Rekning
 */
class RekningarController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Rekning->recursive = 0;
		$this->set('rekningar', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Rekning->id = $id;
		if (!$this->Rekning->exists()) {
			throw new NotFoundException(__('Invalid rekning'));
		}
		$this->set('rekning', $this->Rekning->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Rekning->create();
			if ($this->Rekning->save($this->request->data)) {
				$this->Session->setFlash(__('The rekning has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rekning could not be saved. Please, try again.'));
			}
		}
		$mvaklasser = $this->Rekning->MvaKlasse->find('list');
		$leverandorar = $this->Rekning->Leverandor->find('list');
		$betalingsPengeflyttings = $this->Rekning->BetalingsPengeflytting->find('list');
		$mvaPengeflyttings = $this->Rekning->MvaPengeflytting->find('list');
		$nettoPengeflyttinger = $this->Rekning->NettoPengeflytting->find('list');
		$this->set(compact('mvaklasser', 'leverandorar', 'betalingsPengeflyttings', 'mvaPengeflyttings', 'nettoPengeflyttinger'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Rekning->id = $id;
		if (!$this->Rekning->exists()) {
			throw new NotFoundException(__('Invalid rekning'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rekning->save($this->request->data)) {
				$this->Session->setFlash(__('The rekning has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rekning could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Rekning->read(null, $id);
		}
		$mvaklasser = $this->Rekning->MvaKlasse->find('list');
		$leverandorar = $this->Rekning->Leverandor->find('list');
		$betalingsPengeflyttings = $this->Rekning->BetalingsPengeflytting->find('list');
		$mvaPengeflyttings = $this->Rekning->MvaPengeflytting->find('list');
		$nettoPengeflyttinger = $this->Rekning->NettoPengeflytting->find('list');
		$this->set(compact('mvaklasser', 'leverandorar', 'betalingsPengeflyttings', 'mvaPengeflyttings', 'nettoPengeflyttinger'));
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
		$this->Rekning->id = $id;
		if (!$this->Rekning->exists()) {
			throw new NotFoundException(__('Invalid rekning'));
		}
		if ($this->Rekning->delete()) {
			$this->Session->setFlash(__('Rekning deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rekning was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
