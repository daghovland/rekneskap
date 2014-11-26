<?php
class KunderController extends AppController {
  
  public $paginate = array(
			   'limit' => 200,
			   'order' => array(
					    'Kunde.navn' => 'asc'
					    )
			   );
  
	function index() {
		$this->Kunde->recursive = 0;
		$this->set('kunder', $this->Kunde->find('all', array('order' => array('navn' => 'asc'))));
		$this->Session->write('forrigeSide', array('controller' => 'kunder', 'action' => 'index'));
	}
	
	function ordne_navn($kunde_id){
	  if(is_numeric($kunde_id)){
	      if($this->Kunde->ordneNavn($kunde_id))
		$this->redirect(array('action' => 'view', $kunde_id));
	    }
	    $this->Session->setFlash("Ugyldig kundenummer");
	    $this->redirect(array('action' => 'index'));
	}
	/**
	   Uncommented for safety
	function send_jule_epost(){
	  $kunder = $this->Kunde->sendJuleEpost("julepost2011");
	  $this->set('kunder', $kunder);
	  $this->render('index');
	}
	**/
	function lastopp(){
	  if(!empty($this->request->data)){
	    $filinfo = $this->request->data['Kunde']['submittedfile'];
	    if($filinfo['type'] != 'text/csv'){
	      $this->Session->setFlash(__('Ikke gyldig csv-fil.', true));
	      $this->redirect(array('action'=>'lastopp'));
	    }
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
	    
	    $size = filesize($csvfile);
	    
	    if($size != $filinfo['size']){
	      $this->Session->setFlash(__("Fila endra storleik etter opplasting. Dårlig tegn.", true));
	      return;
	    }

            $feil = array();
            $lagret = array();
	    $linearray = fgetcsv($file, $size, ",", '"');
	    while($linearray){
	      if(count($linearray) > 2){
		$nykunde = array('Kunde' => array('beskrivelse' => $linearray[1], 
				                  'navn' => $linearray[0], 
				                  'epost' => $linearray[3]),
				 'LeveringsAdresse' => array('linje1' => $linearray[1], 
							     'beskrivelse' => $linearray[1], 
							     'poststad' => $linearray[1])
				 );
                $matches = array();
                preg_match_all("/([0-9]{4}) /", $linearray[1], $matches);
                if(count($matches[1]) > 0 )
                  $nykunde['LeveringsAdresse']['postnummer'] = end($matches[1]);
                preg_match_all("/, [0-9]{4} ([a-zæ-å]*)$/i", $linearray[1], $matches);
                if(count($matches[1]) > 0 )
                  $nykunde['LeveringsAdresse']['poststad'] = end($matches[1]);
		if(strlen($linearray[2]) > 3){
		  $nykunde['FakturaAdresse'] = array('linje1' => $linearray[2], 
                                                     'beskrivelse' => $linearray[2], 
                                                     'poststad' => $linearray[2]);
                  preg_match_all("/([0-9]{4}) /", $linearray[2], $matches);
                  if(count($matches[1]) > 0)
                    $nykunde['FakturaAdresse']['postnummer'] = end($matches[1]);
                  preg_match_all("/, [0-9]{4} ([a-zæ-å]*)$/i", $linearray[2], $matches);
                  if(count($matches[1]) > 0 )
                    $nykunde['FakturaAdresse']['poststad'] = end($matches[1]);

                }
	        if($this->Kunde->saveAll($nykunde))
                  $lagret[] = $nykunde;
                else
                  $feil[] = $nykunde;
	      }
	      $linearray = fgetcsv($file, $size, ",", '"');
	    }
	    $this->set(compact('lagret', 'feil'));
	  }
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ugyldig kunde.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('kunde', $this->Kunde->read(null, $id));
	}

	function leverings_adresse($id){
	  if ( $this->RequestHandler->isAjax() ) {
	    Configure::write('debug',0);
	  }
	  $this->view($id);
	}

	function adresser(){
	  $this->layout = 'ajax';
	  $id = $this->request->data['kunde_id'];
	  $this->view($id);
	}

	function faktura_adresse($id){
	  if($this->RequestHandler->isAjax()){
	    Configure::write('debug', 0);
	  }
	  $this->view($id);
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->Kunde->create();
			if(!$this->request->data['Kunde']['separat_faktura'])
			  unset($this->request->data['FakturaAdresse']);
			else
			  unset($this->request->data['FakturaAdresse']['nummer']);
			$this->request->data['Kunde']['registrert'] = $this->Kaffe->dateToSql($this->data['Kunde']['registrert']);
			unset($this->request->data['Kunde']['separat_faktura']);
			unset($this->request->data['Kunde']['nummer']);
			unset($this->request->data['LeveringsAdresse']['nummer']);
			if ($this->Kunde->saveAll($this->request->data)) {
			  $this->Session->setFlash(__('Lagra kunde-opplysningar.', true));
			  $this->redirect(array('action'=>'index'));
			} else {
			  $this->Session->setFlash(__('Kunne ikkje lagre kunden. Prøv igjen.', true));
			}
		}
	        $leveringsadresser = $this->Kunde->LeveringsAdresse->find('list', array('fields' => array('linje1')));
		$fakturaadresser = $this->Kunde->FakturaAdresse->find('list', array('fields' => array('linje1')));
		$this->set(compact('leveringsadresser','fakturaadresser'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Kunde', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->request->data)) {
		  if(!$this->request->data['Kunde']['separat_faktura']){
		    unset($this->request->data['FakturaAdresse']);
		    $this->request->data['Kunde']['fakturaadresse'] = NULL;
		  } else if (!is_numeric($this->request->data['FakturaAdresse']['nummer']))
		    unset($this->request->data['FakturaAdresse']['nummer']);
		  $this->request->data['Kunde']['registrert'] = $this->Kaffe->dateToSql($this->data['Kunde']['registrert']);
		  unset($this->request->data['Kunde']['separat_faktura']);
		  //		  debug($this->request->data, true);
		  if ($this->Kunde->saveAll($this->request->data)) {
		    $this->Session->setFlash(__('The Kunde has been saved', true));
		    $this->redirect(array('action'=>'view', $this->request->data['Kunde']['nummer']));
		  } else {
		    debug($this->request->data, true);
		    $this->Session->setFlash(__('Kunne ikkje lagre nye kunde-opplysningar. Prøv igjen.', true));
		  }
		}
		if (empty($this->request->data)) {
		  $this->request->data = $this->Kunde->read(null, $id);
		}
	        $levering_adresse = $this->Kunde->LeveringsAdresse->find('list');
		$faktura_adresse = $this->Kunde->FakturaAdresse->find('list');
		$this->request->data['Kunde']['separat_faktura'] = isset($this->data['Kunde']['fakturaadresse']);
		$this->set(compact('leverings_adresse','faktura_adresse'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ugyldig kunde id', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kunde->delete($id)) {
			$this->Session->setFlash(__('Sletta kunde nummer ' . $id, true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
