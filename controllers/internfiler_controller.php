<?php
class InternfilerController extends AppController {

	var $name = 'Internfiler';
	var $components = array('Session');
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Internfil->recursive = 0;
		$this->set('internfiler', $this->paginate());
	}

	function view($id = null) {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Invalid Internfil.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->layout = 'any'; //this will use the any.ctp layout

		$this->set('internfil', $this->Internfil->read(null, $id));
        	$this->render();
	}

	function add() {
			if(!empty($this->data)){
		            $filinfo = $this->data['Internfil']['submittedfile'];
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

			$this->data['Internfil']['size'] = $size;
			$this->data['Internfil']['innhold'] = file_get_contents($filinfo['tmp_name']);
			$this->data['Internfil']['filtype'] = $filinfo['type'];
			$this->data['Internfil']['filnavn'] = $filinfo['name'];
	

				$this->data['Internfil']['selger_id'] = $this->Session->read('Auth.selger');
			$this->Internfil->create();
			if ($this->Internfil->save($this->data)) {
				$this->Session->setFlash(__('Fila er lagra', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Kunne ikkje lagre file', true));
			}
		}
	}

	function edit($id = null) {
		if ((!$id || !is_numeric($id)) && empty($this->data)) {
			$this->Session->setFlash(__('Ugyldig Internfil', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Internfil->save($this->data)) {
				$this->Session->setFlash(__('Fila er lagra', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Kunne ikkje lagre fila.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Internfil->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Internfil', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Internfil->del($id)) {
			$this->Session->setFlash(__('Internfil deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
