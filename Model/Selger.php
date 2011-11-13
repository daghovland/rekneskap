<?php
class Selger extends AppModel {
  public $name = 'Selger';
  public $primaryKey = 'nummer';
  public $useTable = 'selgere';
  public $actsAs = array('Acl' => 'requester');

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
					  'conditions' => '',
					  'fields' => '',
					  'order' => ''
					  )
			 );


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
			);
						    
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
   */
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
  
  
  }
?>
