<?php
class KunderController extends AppController {

	var $name = 'Kunder';
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Adresser');
	var $components = array('Acl', 'Session', 'Kaffe', 'RequestHandler');

	var $paginate = array(
		'limit' => '200',
		'order' => array(
				'Kunde.navn' => 'asc'
				)
	);

	function index() {
		$this->Kunde->recursive = 0;
		$this->set('kunder', $this->paginate());
		$this->Session->write('forrigeSide', array('controller' => 'kunder', 'action' => 'index'));
	}

	function lastopp(){
	  if(!empty($this->data)){
	    $filinfo = $this->data['Kunde']['submittedfile'];
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

	function adresser($id){
	  if ( $this->RequestHandler->isAjax() ) {
	    Configure::write('debug',0);
	  }
	  $this->view($id);
	}

	function faktura_adresse($id){
	  if($this->RequestHandler->isAjax()){
	    Configure::write('debug', 0);
	  }
	  $this->view($id);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Kunde->create();
			if(!$this->data['Kunde']['separat_faktura'])
			  unset($this->data['FakturaAdresse']);
			else
			  unset($this->data['FakturaAdresse']['nummer']);
			$this->data['Kunde']['registrert'] = $this->Kaffe->dateToSql($this->data['Kunde']['registrert']);
			unset($this->data['Kunde']['separat_faktura']);
			unset($this->data['Kunde']['nummer']);
			unset($this->data['LeveringsAdresse']['nummer']);
			if ($this->Kunde->saveAll($this->data)) {
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
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Kunde', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
		  if(!$this->data['Kunde']['separat_faktura']){
		    unset($this->data['FakturaAdresse']);
		    $this->data['Kunde']['fakturaadresse'] = NULL;
		  } else if (!is_numeric($this->data['FakturaAdresse']['nummer']))
		    unset($this->data['FakturaAdresse']['nummer']);
		  $this->data['Kunde']['registrert'] = $this->Kaffe->dateToSql($this->data['Kunde']['registrert']);
		  	  unset($this->data['Kunde']['separat_faktura']);
		  //		  debug($this->data, true);
		  if ($this->Kunde->saveAll($this->data)) {
		    $this->Session->setFlash(__('The Kunde has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
		    debug($this->data, true);
				$this->Session->setFlash(__('Kunne ikkje lagre nye kunde-opplysningar. Prøv igjen.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Kunde->read(null, $id);
		}
	        $levering_adresse = $this->Kunde->LeveringsAdresse->find('list');
		$faktura_adresse = $this->Kunde->FakturaAdresse->find('list');
		$this->data['Kunde']['separat_faktura'] = isset($this->data['Kunde']['fakturaadresse']);
		$this->set(compact('leverings_adresse','faktura_adresse'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Ugyldig kunde id', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Kunde->del($id)) {
			$this->Session->setFlash(__('Sletta kunde nummer ' . $id, true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>