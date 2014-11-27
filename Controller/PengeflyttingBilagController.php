<?php
class PengeflyttingBilagController extends AppController {

	var $name = 'PengeflyttingBilag';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->PengeflyttingBilag->recursive = 0;
		$this->set('pengeflyttingBilag', $this->paginate());
	}

	function view($id = null) {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Ikkje gyldig bilag.', true));
			$this->redirect($this->Session->read('forrigeSide'));
		}
		$this->layout = 'any'; //this will use the any.ctp layout
		$this->set('bilag', $this->PengeflyttingBilag->read(null, $id));
        	$this->render();

	}

	function add($id = null) {
		if (!empty($this->request->data)) {
			$filinfo = $this->request->data['PengeflyttingBilag']['vedleggsfil'];
		            $csvfile = $filinfo['tmp_name'];

		            if(!$filinfo['size']){
		              $this->Session->setFlash(__("Fila er tom. Prøv på nytt.", true));
		              return;
		            }

		            if(!file_exists($csvfile)) {
		              $this->Session->setFlash(__("Fil forsvant under opplasting. Dårlig tegn.", true));
		              return;
		            }

		            $file = fopen($csvfile,"r");

		            if(!$file) {
		              $this->Session->setFlash(__("Kunne ikkje lesa fil. Dårlig tegn.", true));
		              return;
		            }
			    fclose($file);
		            $size = filesize($csvfile);

		            if($size != $filinfo['size']){
		              $this->Session->setFlash(__("Fila endra storleik etter opplasting. Dårlig tegn.", true));
		              return;
		            }

			$this->request->data['PengeflyttingBilag']['size'] = $size;
			$this->request->data['PengeflyttingBilag']['innhold'] = file_get_contents($filinfo['tmp_name']);
			$this->request->data['PengeflyttingBilag']['filtype'] = $filinfo['type'];
			$this->request->data['PengeflyttingBilag']['filnavn'] = $filinfo['name'];
	

				$this->request->data['PengeflyttingBilag']['selger_id'] = $this->Session->read('Auth.selger');
			$this->PengeflyttingBilag->create();
			if ($this->PengeflyttingBilag->save($this->request->data)) {
				$this->Session->setFlash(__('Vedlegget er lagra', true));
				$this->redirect(array(
						      'controller' => 'pengeflyttinger', 
						      'action' => 'view',
						      $this->request->data['PengeflyttingBilag']['pengeflytting_id']));
			} else {
				$this->Session->setFlash(__('Kunne ikkje lagre bilaget.', true));
			}
		}
		$pengeflyttinger = $this->PengeflyttingBilag->Pengeflytting->find('list');
		if($id && is_numeric($id))
		  $this->set('pengeflytting_id', $id);
		$this->set(compact('selgere', 'pengeflyttinger'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid PengeflyttingBilag', true));
			$this->redirect($this->Session->read('forrigeSide'));
		}
		if (!empty($this->request->data)) {
			if ($this->PengeflyttingBilag->save($this->request->data)) {
				$this->Session->setFlash(__('The PengeflyttingBilag has been saved', true));
				$this->redirect($this->Session->read('forrigeSide'));
			} else {
				$this->Session->setFlash(__('The PengeflyttingBilag could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->PengeflyttingBilag->read(null, $id);
		}
		$selgere = $this->PengeflyttingBilag->Selger->find('list');
		$pengeflyttinger = $this->PengeflyttingBilag->Pengeflytting->find('list');
		$this->set(compact('selgere','pengeflyttinger'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for PengeflyttingBilag', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PengeflyttingBilag->del($id)) {
			$this->Session->setFlash(__('PengeflyttingBilag deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>