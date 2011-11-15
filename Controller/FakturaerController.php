<?php
class FakturaerController extends AppController {
  
  public $helpers = array('Html', 'Form', 'Cache', 'Paginator', 'Session');
  /*	var $cacheAction = array(
	'view/' => 21600,
	'index' => 36000,
	'ubetalte'  => 48000
	);
  */
  
  function index() {
    $this->Faktura->recursive = 0;
    $this->set('fakturaer', $this->paginate());
  }
  
  
  function ubetalte() {
    $this->set('fakturaer', $this->Faktura->FakturaUbetalt->find('all', array('conditions' => array('mangler > 0'))));
    $this->set('kunder', $this->Faktura->Kunde->find('list', array('fields' => array('navn'))));
    $this->Session->write('forrigeSide', array('controller' => 'fakturaer', 'action' => 'ubetalte'));
  }

  function view($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Invalid Faktura.', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->set('faktura', $this->Faktura->read(null, $id));
    $this->set('utestaende', $this->Faktura->utestaende($id));
  }


  function synPdf($id = null)
  {
    if (!$id)
      {
	$this->Session->setFlash('Sorry, there was no property ID submitted.');
	$this->redirect(array('action'=>'index'), null, true);
      }
    Configure::write('debug',0); // Otherwise we cannot use this method while developing

    $id = intval($id);

    $faktura = $this->Faktura->findByNummer($id); // here the data is pulled from the database and set for the view
    $kaffesalg = $this->Faktura->Kaffesalg->findByNummer($faktura['Kaffesalg']['nummer']); // here the data is pulled from the database and set for the view
    $kaffepriser = $this->Faktura->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('pris')));
    $kaffenavn = $this->Faktura->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('beskrivelse')));

    if (!$id || empty($faktura))
      {
	$this->Session->setFlash('Sorry, there is no property with the submitted ID.');
	$this->redirect(array('action'=>'index'), null, true);
      }

    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    $this->set(compact('faktura', 'kaffesalg', 'kaffepriser', 'kaffenavn'));
    $this->render();
  }

  /*
    Returnerer en zip fil med alle fakturaer
  */
  function zip(){
    //		Configure::write('debug',0); // Otherwise we cannot use this method while developing
    $this->layout = 'any'; //this will use the pdf.ctp layout
	
    $start_dato = '2009-07-06';
    $slutt_dato = '2010-07-06';
			
    $fakturaer = $this->Faktura->find('all', array('conditions' => array('dato >= ' => $start_dato, 'dato <= ' => $slutt_dato)));
    $innbetalinger = $this->Faktura->Pengeflytting->find('all', array('conditions' => array('Pengeflytting.dato >= ' => $start_dato, 'Pengeflytting.dato <= ' => $slutt_dato)));
    $bilag = $this->Faktura->Pengeflytting->Bilag->find('list', array('fields' => array('id', 'innhold')));
    $kaffesalgene = $this->Faktura->Kaffesalg->find('all', array('conditions' => array('dato >= ' => $start_dato, 'dato <= ' => $slutt_dato))); 
    $kaffesalgene = $this->Faktura->Kaffesalg->find('all', array('conditions' => array('dato >= ' => $start_dato, 'dato <= ' => $slutt_dato))); 
    $kaffepriser = $this->Faktura->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('pris')));
    $kaffenavn = $this->Faktura->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('beskrivelse')));
    $vedlegg = $this->Faktura->Pengeflytting->PengeflyttingBilag->find('list', array('fields' => array('bilag_id', 'pengeflytting_id')));

    $this->set(compact('fakturaer', 'kaffepriser', 'kaffenavn', 'kaffesalgene', 'start_dato', 'slutt_dato', 'bilag', 'innbetalinger', 'vedlegg'));
    $this->render();	
  }

  function add() {
    if (!empty($this->request->data)) {
      $this->Faktura->create();
      if ($this->Faktura->save($this->request->data)) {
	$this->Session->setFlash(__('The Faktura has been saved', true));
	$this->redirect(array('action'=>'index'));
      } else {
	$this->Session->setFlash(__('The Faktura could not be saved. Please, try again.', true));
      }
    }
  }

  function betal($id = null){
    if (!$id && empty($this->request->data)) {
      $this->Session->setFlash(__('Ugyldig Faktura', true));
      $this->redirect(array('action'=>'index'));
    }
    if (!empty($this->request->data)) {
      if ($this->Pengeflytting->saveAll($this->request->data)) {
	$this->Session->setFlash(__('The Faktura has been saved', true));
	$this->redirect(array('action'=>'index'));
      } else {
	$this->Session->setFlash(__('The Faktura could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Faktura->read(null, $id);
    }
  }

  function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Session->setFlash(__('Invalid Faktura', true));
      $this->redirect(array('action'=>'index'));
    }
    if (!empty($this->request->data)) {
      if ($this->Faktura->save($this->request->data)) {
	$this->Session->setFlash(__('The Faktura has been saved', true));
	$this->redirect(array('action'=>'index'));
      } else {
	$this->Session->setFlash(__('The Faktura could not be saved. Please, try again.', true));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Faktura->read(null, $id);
    }
  }

  function delete($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Invalid id for Faktura', true));
      $this->redirect(array('action'=>'index'));
    }
    if ($this->Faktura->del($id)) {
      $this->Session->setFlash(__('Faktura deleted', true));
      $this->redirect(array('action'=>'index'));
    }
  }



}
?>
