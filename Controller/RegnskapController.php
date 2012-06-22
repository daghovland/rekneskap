<?php
class RegnskapController extends AppController {

	var $name = 'Regnskap';
	var $helpers = array('Html', 'Form', 'Cache');
	var $components = array('Acl');
	// Kaffeflytting og Pengeflytting bare for  å få cache til å slettes når disse endres
	var $uses = array('Regnskap', 'Kaffelager', 'RegnskapInntekter', 'RegnskapLagertypeInnut', 'RegnskapLagertypeStart', 'RegnskapLagertypeSlutt', 'RegnskapKaffelagerLagertypeStartSlutt', 'RegnskapUtgifter', 'RegnskapBalanserVisning', 'Kaffeflytting', 'Pengeflytting', 'Konto', 'Kaffepris', 'RegnskapGronneBonnerVerdiStartTotal', 'RegnskapGronneBonnerVerdiSluttTotal');
	var $cacheAction = array(
		'view' => 36000
	);


	function index() {
		$this->Regnskap->recursive = 0;
		$this->set('regnskaper', $this->paginate());
	}

	function view($id = null) {
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Invalid Regnskap.', true));
			$this->redirect(array('action'=>'index'));
		}
		$regnskap = $this->Regnskap->read(null, $id);
		$this->set('regnskap', $regnskap);
		$this->set('pengebalanser', $this->RegnskapBalanserVisning->findAllByRegnskapId($id));
		$this->set('utgifter', $this->RegnskapUtgifter->findAllByRegnskapId($id));
		$this->set('inntekter', $this->RegnskapInntekter->findAllByRegnskapId($id));
	       
		$this->set('kaffe_start_slutt_beholdninger', $this->RegnskapKaffelagerLagertypeStartSlutt->find('all', array('conditions' => array('id' => $id, 'lagertype_id' => 3), 'order' => array('kaffelager_id'))));
		$this->set('bonne_verdi_start', $this->RegnskapGronneBonnerVerdiStartTotal->find('first', array('fields' => array('verdi'), 'conditions' => array('regnskap_id' => $id))));
		$this->set('bonne_verdi_slutt', $this->RegnskapGronneBonnerVerdiSluttTotal->find('first', array('fields' => array('verdi'), 'conditions' => array('regnskap_id' => $id))));
		$this->set('summer_innkjop', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 2))));
		$this->set('summer_salg', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 1))));
		$this->set('summer_utgift', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 5))));
		$this->set('summer_svinn', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 4))));
		$this->set('kaffepriser', $this->Kaffepris->find('list', array('fields' => array('type'))));
		$kaffelagre = $this->Kaffelager->find('list', array('fields' => array('nummer', 'beskrivelse')));
                $kaffelagre[0] = 'Totalt';
		$this->set('kaffelagre', $kaffelagre);
	}


	function syn_pdf($id = null){
		if (!$id || !is_numeric($id)) {
			$this->Session->setFlash(__('Invalid Regnskap.', true));
			$this->redirect(array('action'=>'index'));
		}
          	$this->layout = 'pdf'; //this will use the pdf.ctp layout
		$regnskap = $this->Regnskap->read(null, $id);
		$this->set('regnskap', $regnskap);
		$this->set('beholdninger', $this->RegnskapBalanserVisning->findAllByRegnskapId($id));
		$this->set('utgifter', $this->RegnskapUtgifter->findAllByRegnskapId($id));
		$this->set('inntekter', $this->RegnskapInntekter->findAllByRegnskapId($id));
		$this->set('kaffesalg', $this->Konto->kaffesalg_saldoer($regnskap['Regnskap']['start'], $regnskap['Regnskap']['slutt']));
		$this->set('kaffe_start_slutt_beholdninger', $this->RegnskapKaffelagerLagertypeStartSlutt->find('all', array('conditions' => array('id' => $id, 'lagertype_id' => 3), 'order' => array('kaffelager_id'))));
		$this->set('bonne_verdi_start', $this->RegnskapGronneBonnerVerdiStartTotal->find('first', array('fields' => array('verdi'), 'conditions' => array('regnskap_id' => $id))));
                $this->set('bonne_verdi_slutt', $this->RegnskapGronneBonnerVerdiSluttTotal->find('first', array('fields' => array('verdi'), 'conditions' => array('regnskap_id' => $id))));

		$this->set('kaffe_start_beholdninger', $this->RegnskapLagertypeStart->find('all', array('conditions' => array('id' => $id, 'lagertype_id' => 3), 'order' => array('kaffepris_id'))));
		$this->set('kaffe_slutt_beholdninger', $this->RegnskapLagertypeSlutt->find('all', array('conditions' => array('id' => $id, 'lagertype_id' => 3), 'order' => array('kaffepris_id'))));
		$this->set('summer_innkjop', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 2))));
		$this->set('summer_salg', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 1))));
		$this->set('summer_utgift', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 5))));
		$this->set('summer_svinn', $this->RegnskapLagertypeInnut->find('all', array('conditions' => array('regnskap_id' => $id, 'lagertype_id' => 4))));
		$this->set('kaffepriser', $this->Kaffepris->find('list', array('fields' => array('type'))));
                $kaffelagre = $this->Kaffelager->find('list', array('fields' => array('nummer', 'beskrivelse')));
                $kaffelagre[0] = 'Totalt';
		$this->set('kaffelagre', $kaffelagre);

//		Configure::write('debug',0); // Otherwise we cannot use this method while developing
	        $this->render();
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Regnskap->create();
			if ($this->Regnskap->save($this->request->data)) {
				$this->Session->setFlash(__('The Regnskap has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Regnskap could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Regnskap', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Regnskap->save($this->request->data)) {
				$this->Session->setFlash(__('The Regnskap has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Regnskap could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Regnskap->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Regnskap', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Regnskap->del($id)) {
			$this->Session->setFlash(__('Regnskap deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
