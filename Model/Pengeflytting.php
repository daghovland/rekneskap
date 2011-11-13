<?php
class Pengeflytting extends AppModel {

	var $name = 'Pengeflytting';
	var $useTable = 'pengeflytting';
	var $primaryKey = 'nummer';
	var $validate = array(
		'nummer' => array('numeric'),
		'fra' => array('numeric'),
		'til' => array('numeric'),
		'kroner' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Fra' => array(
			'className' => 'Konto',
			'foreignKey' => 'fra',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Til' => array(
			'className' => 'Konto',
			'foreignKey' => 'til',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Faktura' => array(
			'className' => 'Faktura',
			'foreignKey' => 'dekningsFaktura',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kaffesalg', 'Kaffibrenning', 'Kaffiimport'
	);

	var $hasMany = array(	
				'Bilag',
				'PengeflyttingBilag',
				'Postsending' => array('foreignKey' => 'utgift'),
			     'Kaffeflytting' => array(
					              'className' => 'Kaffeflytting',
                                                      'foreignKey' => 'pengeflytting',
                                                      'dependent' => 'true'
						      )
                             );

	/*
	 Returnerer sum for solgt kaffi siste 365 dager.
	 */
	function summerSalg(){
	  $res = $this->query('SELECT SUM(kroner) FROM (pengeflytting LEFT JOIN kontoer ON pengeflytting.fra=kontoer.nummer) WHERE kontoer.type=\'6\' AND (pengeflytting.dato > (CURDATE() - INTERVAL 1 YEAR))');
	  return $res[0][0]['SUM(kroner)'];
	}

	/*
	 Bruke mest til å se hvor mye hver selger skylder
	 */
	function kontoBalanse($konto){
	  $innTre = $this->findAllByTil($konto);
	  $utTre = $this->findAllByFra($konto);
	  $balanse = 0;
	  foreach($innTre as $inn)
	    $balanse -= $inn[0]['kroner'];
	  foreach($utTre as $ut)
	    $balanse += $ut[0]['kroner'];
	  return $balanse;
	}

}
?>
