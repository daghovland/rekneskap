<?php
class KaffiimportarController extends AppController {

	var $name = 'Kaffiimportar';
	var $helpers = array('Html', 'Form');
	

	function index() {
		$kaffiimportar = $this->Kaffiimport->find('all');
		$this->set('kaffiimportar', $kaffiimportar);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Kaffiimport.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kaffiimport', $this->Kaffiimport->read(null, $id));
	}


	function syn_pdf($id = null){
		if (!$id) {
                        $this->Session->setFlash(__('Invalid Kaffiimport.', true));
                        $this->redirect(array('action'=>'index'));
                }
                $this->layout = 'pdf'; //this will use the pdf.ctp layout
		$this->set('kaffiimport', $this->Kaffiimport->read(null, $id));
		$this->render();
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Kaffiimport->create();
			if ($this->Kaffiimport->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffiimport has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffiimport could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Kaffiimport', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Kaffiimport->save($this->request->data)) {
				$this->Session->setFlash(__('The Kaffiimport has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Kaffiimport could not be saved. Please, try again.', true));
			}
		}
		$this->request->data = $this->Kaffiimport->read(null, $id);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffiimport', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kaffiimport->del($id)) {
			$this->Session->setFlash(__('Kaffiimport deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
