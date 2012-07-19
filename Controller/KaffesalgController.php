<?php
class KaffesalgController extends AppController {

  function index() {
    $this->Kaffesalg->recursive = 0;
    $this->set('kaffesalg', $this->paginate());
    $this->set('kaffesalgvekt', $this->Kaffesalg->Kaffesalgvekt->find('list'));
  }

  function view($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Ugyldig kaffisal.', true));
      $this->redirect(array('action'=>'index'));
    }
    $this->set('kaffetyper', $this->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('type'))));
    $this->set('kontoer', $this->Kaffesalg->Pengeflytting->Fra->find('list'));
    $this->set('kunder', $this->Kaffesalg->Faktura->Kunde->find('list', array('fields' => array('navn'))));
    $this->set('kaffeflyttinger', $this->Kaffesalg->Kaffeflytting->findAllByKaffesalgId($id));
    $this->set('kaffesalg', $this->Kaffesalg->read(null, $id));
  }

  function frakt_pris(){
    $this->layout = 'ajax';
    $antallInfo = $this->request->data;
    $frakt = $this->Kaffesalg->frakt_pris($antallInfo);
    if($antallInfo['postSending'] && $this->Kaffesalg->kaffi_vekt($antallInfo) > 0)
      $this->set('frakt', $frakt);
    else
      $this->set('frakt', ' Berre mogleg når du har valt ein kunde og innhald i pakka.');
  }


  function faktura_tekst(){
    $this->layout = 'ajax';
    $antallInfo = $this->request->data;
    $tekst = '<h2>Fakturatekst</h2>' . $this->Kaffesalg->faktura_tekst($antallInfo) 
      .  '<h2>Nettovekt</h2>' . $this->Kaffesalg->kaffi_vekt($antallInfo);
    $this->set('tekst', $tekst);
  }


  function sending(){
    $this->add();
  }


  function kontantsal(){
    $selgerData = $this->Auth->user();
    if(!empty($this->request->data)){
      if($this->Kaffesalg->lag_kontant_salg($selgerData['nummer'], $this->request->data['Kaffesalg'])){
	$this->Session->setFlash(__('Registrerte kaffisal'));
	$this->redirect(array('action' => 'view', $this->Kaffesalg->id));
      } else {
	$this->Session->setFlash(__('Kunne ikkje registrere kaffisal'));
      }
    }
    $this->set('rabatter', $this->Kaffesalg->hent_rabatter());
    $this->set('kaffetyper', $this->Kaffesalg->Kaffeflytting->Kaffepris->find('all', array('order' => 'nummer DESC')));
    $this->set('kaffetypenavn', $this->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('type'))));
    $lagerNummer =  $this->Kaffesalg->Kaffeflytting->Fra->find('first', 
							       array('conditions' => array('Fra.selger' => $selgerData['nummer'], 
											   'Fra.lagertype' => 3)));
    $this->set('kaffelagerbeholdninger', $this->Kaffesalg->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', 
													  array('conditions' => array('kaffelager_id' => $lagerNummer['Fra']['nummer'],
																      'lagertype_id' => 3), 
														'fields' => array('kaffepris_id', 'antall'))));
    $this->set('selgerInfo', $this->Kaffesalg->Kaffeflytting->Fra->Selger->findAllByNummer($selgerData['nummer']));
		
  }

  function add() {
    $this->Session->write('forrigeSide', 
			  array('controller' => 'kaffesalg', 
				'action' => 'add'));
    if(!empty($this->request->data)){
      if(!$this->Kaffesalg->lag_salg($this->Kaffe->dateToSql($this->request->data['Kaffesalg']['dato']), 
				     $this->request->data['Kaffesalg']))
	{
	  $this->Session->setFlash(__('Kunne ikkje lagre kaffisalet. Prøv igjen',   true));
	  $this->redirect(array('action' => 'add'));
	} else {	    
	$this->Session->setFlash(__('Salet er registrert', 
				    true));
	$this->redirect(array('controller' => 'kaffesalg', 
			      'action'=>'view',
			      $this->Kaffesalg->id));
      }
    }
    $innstillingar = $this->Kaffesalg->Innstilling->find('first');
    $standardLager = $innstillingar['Innstilling']['standard_lager'];
    $this->set('standardLager', $standardLager);
    if(isset($this->params['named']['kundenummer']))
      $this->set('kundenummer', $this->params['named']['kundenummer']);		
    $this->set('rabatter', $this->Kaffesalg->hent_rabatter());
    $this->set('SentrallagerBeholdninger', $this->Kaffesalg->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', 
													    array('conditions' => array('kaffelager_id' => $standardLager,
																	'er_vanlig_lagertype' => true),
														  'fields' => array('kaffepris_id', 'antall') 
														  )))
      ;
    $this->set('fralagre', $this->Kaffesalg->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', array('fields' => array('kaffelager_id', 'kaffelager_id'), 'conditions' => array('er_vanlig_lagertype' => true))));
    $this->set('kunder', $this->Kaffesalg->Faktura->Kunde->find('list', array('fields' => array('navn'), 'order' => array('navn ASC'))));
    $this->set('fralagernavn', $this->Kaffesalg->Kaffeflytting->Fra->Kaffelagerbeholdning->find('list', array('fields' => array('kaffelager_id', 'lagernavn'), 'conditions' => array('er_vanlig_lagertype' => true))));
    $this->set('kaffetyper', $this->Kaffesalg->Kaffeflytting->Kaffepris->find('all', array('order' => 'nummer DESC')));
    $this->set('kaffetypenavn', $this->Kaffesalg->Kaffeflytting->Kaffepris->find('list', array('fields' => array('type'))));
    $selgerData = $this->Auth->user();
    $this->set('selgerInfo', $this->Kaffesalg->Kaffeflytting->Fra->Selger->findAllByNummer($selgerData['nummer']));
    $this->set('selgerListe', $this->Kaffesalg->Kaffeflytting->Fra->Selger->find('list', array('fields' => array('navn'))));
  }
	
  function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Session->setFlash(__('Invalid Kaffesalg', true));
      $this->redirect(array('action'=>'index'));
    }
    if (!empty($this->request->data)) {
      if ($this->Kaffesalg->save($this->request->data)) {
	$this->Session->setFlash(__('Kaffisalet er lagra', true));
	$this->redirect(array('action'=>'index'));
      } else {
	$this->Session->setFlash(__('Kunne ikkje lagre kaffisalet. Prøv igjen.', true));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Kaffesalg->read(null, $id);
    }
  }

  function delete($id = null) {
    if (!$id) {
      $this->Session->setFlash(__('Ugyldig id for kaffisal', true));
      $this->redirect(array('action'=>'index'));
    }
    if ($this->Kaffesalg->delete($id)) {
      $this->Session->setFlash(__('sletta kaffisal', true));
      $this->redirect(array('action'=>'index'));
    }
  }


  function lastopp(){
    if(!empty($this->request->data)){
      $filinfo = $this->request->data['Kaffesalg']['submittedfile'];
      $csvfile = $filinfo['tmp_name'];
	    
      if(!$filinfo['size']){
	$this->Session->setFlash(__("Fila er tom. Prøv på nytt.", true));
	return;
      }

      if(!file_exists($csvfile)) {
	$this->Session->setFlash(__("Fila forsvant under opplasting. Dårlig tegn.", true));
	return;
      }
	    
      $file = fopen($csvfile,"r");
	    
      if(!$file) {
	$this->Session->setFlash(__("Kunne ikkje lesa fil. Dårlig tegn.", true));
	return;
      }
	    
      $size = filesize($csvfile);
	    
      if($size != $filinfo['size']){
	$this->Session->setFlash(__("Fila endra storleik etter opplasting. Dårlig tegn.", true));
	return;
      }

      $feil = array();
      $lagret = array();
      $linearray = fgetcsv($file, $size, ",", '"');
      while($linearray = fgetcsv($file, $size, ",", '"')){
	if(count($linearray) > 2){
	  $dato = $this->Kaffe->BankDatoSql($linearray[6]);
	  $frakt = $linearray[5];
	  $total = $linearray[8];
	  $fakturatekst = (($linearray[4] > 0) ? ($linearray[4] . ' filter ') : '') ;
	  $kundeInfo = $this->Kaffesalg->Faktura->Kunde->findByNavn($linearray[0]);
	  $nysalg = array('Kaffesalg' => array(
					       'internmelding' => 'Generert fra Magnus sin liste: ' . $linearray[0] . ' ' . $fakturatekst, 
					       'fakturatekst' => $fakturatekst, 
					       'selger_id' => 5,
					       'frakt' => $frakt,
					       'total' => $total,
					       'mva' => 0,
					       'dato' => $dato)); 
		
		
	  $nysalg['Faktura'] = array('nummer' => $linearray[7],
				     'melding' => $fakturatekst,
				     'faktura_dato' => $dato,
				     'kroner' => $total,
				     'totalpris' => $total,
				     'mva' => 0,
				     'betalings_frist' => $dato,
				     'kunde' => $kundeInfo['Kunde']['nummer'],
				     'adresse' => ($kundeInfo['Kunde']['fakturaadresse']) ? $kundeInfo['Kunde']['fakturaadresse'] : $kundeInfo['Kunde']['leveringsadresse'],
				     'total' => $total);
	  if($total - $frakt != $linearray[4] * 40){
	    echo "Feil totalsum i lagring av ";
	    debug($linearray);
	  }
	  if($this->Kaffesalg->saveAll($nysalg)){
	    $lagret[] = $nysalg;
	  } else
	    $feil[] = $nysalg;
	}
      }
      $this->set(compact('lagret', 'feil'));
    }
  }


}
?>
