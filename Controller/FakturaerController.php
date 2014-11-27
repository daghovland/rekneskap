<?php
class FakturaerController extends AppController {

  public $paginate = array('limit' => 200,
			   'order' => array('Faktura.nummer' => 'asc'));


  function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow('autopurr');
  }
  

  function index() {
    $data = $this->paginate('Faktura');
    $this->set('fakturaer', $data);
  }
  
  function autopurr(){
    $this->Faktura->autopurr();
    $this->layout = "tom";
  }
  
  function ubetalte() {
    $this->set('fakturaer', $this->Faktura->FakturaUbetalt->find('all', array('conditions' => array('mangler > 0'))));
    $this->set('kunder', $this->Faktura->Kunde->find('list', array('fields' => array('navn'))));
    $this->Session->write('forrigeSide', array('controller' => 'fakturaer', 'action' => 'ubetalte'));
  }

  function opne(){
    $this->set('opneTingingar', $this->Faktura->FakturaUbetalt->find('all', array('conditions' => array('pakket IS NULL'))));
    $this->set('vekt', $this->Faktura->Kaffesalg->Kaffesalgvekt->find('list', array('fields' => array('kaffesalg_id', 'netto_gram'))));
    $this->set('kunder', $this->Faktura->Kunde->find('list', array('fields' => array('navn'))));
    $this->Session->write('forrigeSide', array('controller' => 'fakturaer', 'action' => 'opne'));
  }

  function pakket($id = null){
    if($id){
      $user_id = $this->Auth->user('nummer');
      if(!$this->Faktura->registrerPakking($id, $user_id))
	{
	  $this->Session->setFlash(__('Kunne ikkje registrere pakking av faktura " + $id + ". Prøv igjen',   true));
	  $this->redirect(array('action' => 'opne'));
	} else {	    
	$this->Session->setFlash(__('Pakkinga er registrert', 
				    true));
	$this->redirect(array('controller' => 'fakturaer', 
			      'action'=>'opne'));
      }
    }
  }

  function tingServicepakke($id=null){
    if($id){
      try{
	$res = $this->Faktura->tingServicepakke($id);	
	$this->Session->setFlash('Servicepakke er tinga hos Bring');

	$this->redirect(array('controller' => 'fakturaer', 
			      'action'=>'opne'));
      } catch(Exception $e)
	{
	  $this->Session->setFlash('Kunne ikkje tinge Bring for rekning ' + $id + '. Melding: ' . $e);
	  $this->redirect(array('action' => 'opne'));
	} 

    }
  }


  function tingBedriftspakke($id=null){
    if($id){
      try{
	$res = $this->Faktura->tingBedriftspakke($id);	
	$this->Session->setFlash('Bedriftspakke er tinga hos Bring');

	$this->redirect(array('controller' => 'fakturaer', 
			      'action'=>'opne'));
      } catch(Exception $e)
	{
	  $this->Session->setFlash('Kunne ikkje tinge Bring for rekning ' + $id + '. Melding: ' . $e);
	  $this->redirect(array('action' => 'opne'));
	} 

    }
  }

  function view($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Invalid Faktura.', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->set('faktura', $this->Faktura->read(null, $id));
    $this->set('utestaende', $this->Faktura->utestaende($id));
  }

  
  function bpost($id = null){
    $id = intval($id);
    $faktura = $this->Faktura->findByNummer($id); // here the data is pulled from the database and set for the view
    if (!$id || empty($faktura)){
      $tingingar = $this->Faktura->find('all', array('conditions' => array('pakket IS NULL')));
      $tcpdf = $this->Faktura->lagBPostEtiketter($tingingar);
      $filnavn = "bpost.pdf";
    } else {
      $tcpdf = $this->Faktura->lagBPostEtikett($faktura);
      $filnavn = "bpost"  . $faktura['Faktura']['nummer'] . ".pdf";
    }
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    $this->set(compact('tcpdf', 'filnavn'));
    $this->render();
  }

  function synPdf($id = null)
  {
    if (!$id)
      {
	$this->Session->setFlash('Sorry, there was no property ID submitted.');
	$this->redirect(array('action'=>'index'), null, true);
      }
    $id = intval($id);
    $faktura = $this->Faktura->findByNummer($id); // here the data is pulled from the database and set for the view
    $kaffesalg = $this->Faktura->Kaffesalg->findByNummer($faktura['Kaffesalg']['nummer']); // here the data is pulled from the database and set for the view
    if (!$id || empty($faktura))
      {
	$this->Session->setFlash('Sorry, there is no property with the submitted ID.');
	$this->redirect(array('action'=>'index'), null, true);
      }
    $tcpdf = $this->Faktura->lagFakturaTcpdf($faktura, $kaffesalg);
    $filnavn = "faktura"  . $faktura['Faktura']['nummer'] . ".pdf";
    $this->layout = 'pdf'; //this will use the pdf.ctp layout
    $this->set(compact('tcpdf', 'filnavn'));
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
    if ($this->Faktura->delete($id)) {
      $this->Session->setFlash(__('Faktura deleted', true));
      $this->redirect(array('action'=>'index'));
    }
  }



}
?>
