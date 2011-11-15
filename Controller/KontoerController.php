<?php
class KontoerController extends AppController {

	var $paginate = array('limit' => 200);

	function index() {
		$this->Konto->recursive = 0;
		$this->set('balanser', $this->Konto->Kontobalanse->find('all'));
		$this->set('kontotyper', $this->Konto->Kontotype->find('list', array('fields' => array('nummer', 'beskrivelse'))));
		$this->set('selgere', $this->Konto->Selger->find('list', array('fields' => array('nummer', 'navn'))));
		$this->set('kontoer', $this->Konto->find('all'));
	}

	function view($id = null, $sort='dato') {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Invalid Konto.', true));
			$this->redirect(array('action'=>'index'));
		}
		$kontodata = $this->Konto->read(null, $id);
		$this->set('balanse', $this->Konto->balanse($id));
		$this->set('pengeflyttinger', $this->paginate('Konto.kontoInnskudd', array('kontoInnskudd.fra =' . $id . ' OR kontoInnskudd.til = ' . $id))); 
		$this->set('bevegelser', $this->Konto->kontoInnskudd->find('all', array('conditions' => '(kontoInnskudd.fra = ' . $id . ' OR kontoInnskudd.til = ' . $id . ') ORDER BY kontoInnskudd.dato')));
		$this->set('konto', $kontodata);
		$this->set('vedlegg', $this->Konto->kontoInnskudd->PengeflyttingBilag->find('list', array('fields' => array('bilag_id', 'bilag_id', 'pengeflytting_id'))));
		$this->Session->write('forrigeSide', array('controller' => 'kontoer', 'action' => 'view',$id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Konto->create();
			if ($this->Konto->save($this->request->data)) {
				$this->Session->setFlash(__('The Konto has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Konto could not be saved. Please, try again.', true));
			}
		}
		$kontotyper = $this->Konto->Kontotype->find('list', array('fields' => array('beskrivelse')));
		$selgere = $this->Konto->Selger->find('list', array('fields' => array('navn')));
		$this->set(compact('kontotyper', 'selgere'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Konto', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Konto->save($this->request->data)) {
				$this->Session->setFlash(__('The Konto has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Konto could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Konto->read(null, $id);
		}
		$typer = $this->Konto->Kontotype->find('list', array('fields' => array('beskrivelse')));
		$ansvarlige = $this->Konto->Selger->find('list', array('fields' => array('navn')));
		$this->set(compact('typer','ansvarlige'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Konto', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Konto->del($id)) {
			$this->Session->setFlash(__('Konto deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
