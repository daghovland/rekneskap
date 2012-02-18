<?php
App::uses('CakeEmail', 'Network/Email');
class Selger extends AppModel {
  public $name = 'Selger';
  public $primaryKey = 'nummer';
  public $useTable = 'selgere';

  // Values returned from glemtPassord
  public $OK = 0;
  public $FEIL_BRUKERNAVN = 1;
  public $INGEN_EPOST = 2;

  function hashPasswords($data) {
    if (isset($data['Selger']['passord'])) {
      $data['Selger']['passord'] = md5($data['Selger']['passord']);
      return $data;
    }
    return $data;
  }

 
  function parentNode() {
    if (!$this->id && empty($this->data)) {
      return null;
    }
    $data = $this->data;
    if (empty($this->data)) {
      $data = $this->read();
    }
    if (!isset($data['Selger']['rolle_id'])) {
      return null;
    } else {
      return array('Rolle' => array('nummer' => $data['Selger']['rolle_id']));
    }
  }
  
  var $validate = array(
			'navn' => array('notempty'),
			'passord' => array('notempty'),
			'rolle_id' => array('numeric')
			);
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed
  var $belongsTo = array(
			 'Rolle' => array(
					  'className' => 'Rolle',
					  'foreignKey' => 'rolle_id',
					  )
			 )
    ;
  
  
  var $hasOne = array(
		      'Kaffelager' => array(
					    'className' => 'Kaffelager',
					    'foreignKey' => 'selger',
					    'conditions' => 'Kaffelager.beskrivelse = Selger.navn'
					    ),
		      'SelgerKonto' => array(
					     'className' => 'Konto',
					     'foreignKey' => 'ansvarlig',
					     'conditions' => array('SelgerKonto.type' => 7)

					     ),
		      'SalgsKonto' => array(
					    'className' => 'Konto',
					    'foreignKey' => 'ansvarlig',
					    'conditions' => array('SalgsKonto.type' => 6)

					    ),
		      'Selgerbalanse' => array(
					       'className' => 'Selgerbalanse',
					       'foreignKey' => 'selger_id'	
					       )
		      )
    ;
						    
  var $hasMany = array(
		       'SelgerLagre' => array(
					      'className' => 'Kaffelager',
					      'foreignKey' => 'selger'
					      ),
		       'Kaffesalg'
		       );
  
  /**    
   * After save callback
   *
   * Update the aro for the user.
   *
   * @access public
   * @return void
  function afterSave($created) {
    if (!$created) {
      $parent = $this->parentNode();
      $parent = $this->node($parent);
      $node = $this->node();
      $aro = $node[0];
      $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
      $this->Aro->save($aro);
    }
  }
   */
  

  /**
     Brukes til å sende en epost med lenke til 
     side for å få nytt passord
     
     Setter tmp_key i databasen, som sendes med i lenken

     @param @base_url er urlen til action "nytt passord". Denne må finnes fra controlleren
     @param $username er brukernavnet
  **/
  function glemt_passord($username){
    if(!is_string($username))
      return $this->FEIL_BRUKERNAVN;
    $userData = $this->find('first', array('conditions' => array('Selger.navn' => $username)));
    if(!isset($userData['Selger']))
      return $this->FEIL_BRUKERNAVN;
    if(!isset($userData['Selger']['epost']))
      return $this->INGEN_EPOST;
    $epostAdr = $userData['Selger']['epost'];
    $tmp_key = Security::generateAuthKey();
    $userData['Selger']['tmp_key'] = $tmp_key;
    $userData['Selger']['tmp_key_created'] = date('c');
    $this->save($userData);
    $email = new CakeEmail('default');
    $email->viewVars(array('tmp_key' => $userData['Selger']['tmp_key'],
			   'user_id' => $userData['Selger']['nummer'],
			   'epost' => $userData['Selger']['epost'],
			   'navn' => $userData['Selger']['navn']));
    $email->template('nytt_passord', 'vanlig')
      ->emailFormat('html')
      ->to($userData['Selger']['epost'])
      ->from("dag@zapatista.no")
      ->subject("Passord tilbakestilling")
      ->send();
    return $this->OK;
  }


  function riktig_tmp_key($userid, $tmp_key){
    $userData = $this->find('first', array('conditions' => array('Selger.nummer' => $userid, 'Selger.tmp_key' => $tmp_key)));
    if(!$userData || !isset($userData['Selger']))
      return false;
    $userData['Selger']['tmp_key'] = "";
    $this->save($userData);
    return true;
  }
}
?>
