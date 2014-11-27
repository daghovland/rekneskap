<?php 
/* SVN FILE: $Id$ */
/* Kunde Test cases generated on: 2010-01-02 00:01:22 : 1262389462*/
App::import('Model', 'Kunde');

class KundeTestCase extends CakeTestCase {
	var $Kunde = null;
	var $fixtures = array('app.kunde', 'app.adresse', 'app.adresse');

	function startTest() {
		$this->Kunde =& ClassRegistry::init('Kunde');
	}

	function testKundeInstance() {
		$this->assertTrue(is_a($this->Kunde, 'Kunde'));
	}

	function testKundeFind() {
		$this->Kunde->recursive = -1;
		$results = $this->Kunde->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kunde' => array(
			'nummer'  => 1,
			'navn'  => 'Lorem ipsum dolor sit amet',
			'epost'  => 'Lorem ipsum dolor sit amet',
			'telefon'  => 'Lorem ',
			'slettes'  => 1,
			'registrert'  => '2010-01-02',
			'kontaktperson'  => 'Lorem ipsum dolor sit amet',
			'fakturaadresse'  => 1,
			'leveringsadresse'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>