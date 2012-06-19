<?php
class KaffeflyttingerController extends AppController {

  public $helpers = array('Js' => array('Prototype'), 'Html', 'Form', 'Cache');
  public $cacheAction = array(
			      'view/' => 36000,
			      'index/' => 36000,
			      'hent_kaffi/'  => 48000
			      );
  
  function index() {
    $this->Kaffeflytting->recursive = 0;
    $this->set('kaffeflyttinger', $this->paginate());
    $this->Session->write('forrigeSide', array('controller' => 'kaffeflyttinger', 'action' => 'index', '/page:1/sort:dato/direction:desc'));
  }
  
  function svinn(){
    if(!empty($this->request->data)){
      $this->request->data['Kaffeflytting']['til'] = $this->data['Kaffeflytting']['fra'];
      $this->add();
    }  else {
      $standardLager = $this->Kaffeflytting->Fra->find('first', array('conditions' => array('er_standard_lager' => true)));
      $this->set('standardLager', $standardLager['Fra']['nummer']);
      $this->set('standardBeholdninger', 
		 $this->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', 
								       array('conditions' => array('kaffelager_id' => $standardLager['Fra']['nummer'],
												   'er_vanlig_lagertype' => true),
									     'order' => 'kaffepris_id DESC',
									     'fields' => array('kaffepris_id', 'antall')
									     )
								       )
		 )
	;
      $this->set('fralagre', $this->Kaffeflytting->Fra->find('list'));
      $this->set('fralagernavn', $this->Kaffeflytting->Fra->find('list', array('fields' => array('beskrivelse'))));
      $this->set('kaffetyper', $this->Kaffeflytting->Kaffepris->find('list'));
      $this->set('kaffetypenavn', $this->Kaffeflytting->Kaffepris->find('list', array('fields' => array('intern_navn'))));
      $this->set('kaffetypebeskrivelse', $this->Kaffeflytting->Kaffepris->find('list', array('fields' => array('beskrivelse'))));
      $selgerData = $this->Auth->user();
      $this->set('selgerInfo', $this->Kaffeflytting->Fra->Selger->findAllByNummer($selgerData['nummer']));
    }
  }
  
  
  function hent_kaffi(){
    $standardLager =  $this->Kaffeflytting->Fra->find('first', array('conditions' => array('er_standard_lager' => true)));
    $this->set('standardLager', $standardLager['Fra']['nummer']);
    $this->set('standardBeholdninger', 
	       $this->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', 
								     array('conditions' => array('kaffelager_id' => $standardLager['Fra']['nummer'],
												 'er_vanlig_lagertype' => true),
									   'order' => 'kaffepris_id DESC',
									   'fields' => array('kaffepris_id', 'antall')
									   )
								     )
	       )
      ;
    $this->set('fralagre', $this->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', array('fields' => array('kaffelager_id', 'kaffelager_id'), 'conditions' => array('er_vanlig_lagertype' => true))));
    $this->set('fralagernavn', $this->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', array('fields' => array('kaffelager_id', 'lagernavn'), 'conditions' => array('er_vanlig_lagertype' => true))));
    $this->set('kaffetyper', $this->Kaffeflytting->Kaffepris->find('list', array('order' => array('nummer ASC'))));
    $this->set('kaffetypenavn', $this->Kaffeflytting->Kaffepris->find('list', array('fields' => array('intern_navn'))));
    $this->set('kaffetypebeskrivelse', $this->Kaffeflytting->Kaffepris->find('list', array('fields' => array('beskrivelse'))));
    $selgerData = $this->Auth->user();
    $this->set('selgerInfo', $this->Kaffeflytting->Fra->Selger->findAllByNummer($selgerData['nummer']));
  }
  
  
  function view($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Invalid Kaffeflytting.', true));
      $this->redirect(array('action'=>'index', '/page:1/sort:nummer/direction:desc'));
    }
    $kaffeflytting = $this->Kaffeflytting->findAllByNummer($id);
    $this->set('kaffeflytting', $kaffeflytting[0]);
    //    $this->Session->write('forrigeSide', array('controller' => 'kaffeflyttinger', 'action' => 'view', $id));
  }
  
  
  function add() {
    if (!empty($this->request->data)) {
      $this->Kaffeflytting->create();
      if ($this->Kaffeflytting->save($this->request->data)) {
	$this->Session->setFlash(__('Kaffeflyttinga er lagra', true));
	$this->redirect(array('action' => 'view', $this->Kaffeflytting->id));
      } else {
	$this->Session->setFlash(__('Kunne ikkje lagre kaffeflyttinga. Prøv igjen.', true));
      }
    }
    if(isset($this->params['named']['kaffesalg']) && is_numeric($this->params['named']['kaffesalg']))
      $this->set('kaffesalg_nummer', $this->params['named']['kaffesalg']);
    if(isset($this->params['named']['dato']) && preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $this->params['named']['dato']))
      $this->set('kaffesalg_dato', $this->params['named']['dato']);
    $kaffesalg = $this->Kaffeflytting->Kaffesalg->find('list');
    $fra = $this->Kaffeflytting->Fra->find('list');
    $til = $fra;
    $kaffetyper = $this->Kaffeflytting->Kaffepris->find('list');
    $typer = $kaffetyper;
    $lagertyper = $this->Kaffeflytting->Fralagertypenavn->find('list');
    $this->set(compact('kaffesalg', 'fra', 'til', 'typer', 'kaffetyper', 'lagertyper'));
  }
  
  function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Session->setFlash(__('Ugyldig Kaffeflytting', true));
      //$this->redirect($this->Session->read('forrigeSide'));
    }
    if (!empty($this->request->data)) {
      if ($this->Kaffeflytting->save($this->request->data)) {
	$this->Session->setFlash(__('Kaffeflyttinga er lagra', true));
	$this->redirect(array('action' => 'view', $id));
      } else {
	$this->Session->setFlash(__('Kunne ikkje lagre kaffeflyttinga. Prøv igjen.', true));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Kaffeflytting->read(null, $id);
    }
    $pengeflyttinger = $this->Kaffeflytting->Kontantbetaling->find('list');
    $kaffibrenningar = $this->Kaffeflytting->Kaffibrenning->find('list');
    $fralagre = $this->Kaffeflytting->Fra->find('list');
    $tillagre = $this->Kaffeflytting->Til->find('list');
    $kaffetyper = $this->Kaffeflytting->Kaffepris->find('list');
    $lagertyper = $this->Kaffeflytting->Tillagertypenavn->find('list');
    $kaffesalg = $this->Kaffeflytting->Kaffesalg->find('list');
    $this->set(compact('pengeflyttinger','fralagre','kaffibrenningar', 'tillagre','kaffetyper','lagertyper', 'kaffesalg'));
  }
  
  function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Kaffeflytting', true));
		}
		if ($this->Kaffeflytting->delete($id)) {
			$this->Session->setFlash(__('Kaffeflytting deleted', true));
		}
		$this->redirect(array('action' => 'index'));
	}

}
?>
