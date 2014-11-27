<?php
class BilagController extends AppController {

	var $name = 'Bilag';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Bilag->recursive = 0;
		$this->set('bilag', $this->paginate());
	}

	function view($id = null) {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Ikkje gyldig bilag.', true));
			$this->redirect($this->Session->read('forrigeSide'));
		}
		Configure::write('debug', 0);
		$this->Bilag->recursive = -1;
		//		$this->layout = 'any'; //this will use the any.ctp layout
		$this->set('bilag', $this->Bilag->read(null, $id));
        	$this->render();
	}

	function add($id = null) {
		if (!empty($this->request->data)) {
			$filinfo = $this->request->data['Bilag']['vedleggsfil'];
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

			$this->request->data['Bilag']['size'] = $size;
			$this->request->data['Bilag']['innhold'] = file_get_contents($filinfo['tmp_name']);
			$this->request->data['Bilag']['filtype'] = $filinfo['type'];
			$this->request->data['Bilag']['filnavn'] = $filinfo['name'];
	

				$this->request->data['Bilag']['selger_id'] = $this->Session->read('Auth.selger');
			$this->Bilag->create();
			if ($this->Bilag->save($this->request->data)) {
				$this->Session->setFlash(__('Vedlegget er lagra', true));
				$this->redirect(array(
						      'controller' => 'pengeflyttinger', 
						      'action' => 'view',
						      $this->request->data['Bilag']['pengeflytting_id']));
			} else {
				$this->Session->setFlash(__('Kunne ikkje lagre bilaget.', true));
			}
		}
		$pengeflyttinger = $this->Bilag->Pengeflytting->find('list');
		if($id && is_numeric($id))
		  $this->set('pengeflytting_id', $id);
		$this->set(compact('selgere', 'pengeflyttinger'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Ugyldi bilag', true));
			$this->redirect($this->Session->read('forrigeSide'));
		}
		if (!empty($this->request->data)) {
			if ($this->Bilag->save($this->request->data)) {
				$this->Session->setFlash(__('The Bilag has been saved', true));
				$this->redirect($this->Session->read('forrigeSide'));
			} else {
				$this->Session->setFlash(__('The Bilag could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Bilag->read(null, $id);
		}
		$selgere = $this->Bilag->Selger->find('list');
		$pengeflyttinger = $this->Bilag->Pengeflytting->find('list');
		$this->set(compact('selgere','pengeflyttinger'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ugyldig Bilag', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bilag->del($id)) {
			$this->Session->setFlash(__('Bilaget er sletta', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>