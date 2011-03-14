<?php 
/* SVN FILE: $Id$ */
/* Adresse Test cases generated on: 2010-01-01 20:01:23 : 1262375723*/
App::import('Model', 'Adresse');

class AdresseTestCase extends CakeTestCase {
	var $Adresse = null;
	var $fixtures = array('app.adresse', 'app.kunde', 'app.kunde', 'app.faktura');

	function startTest() {
		$this->Adresse =& ClassRegistry::init('Adresse');
	}

	function testAdresseInstance() {
		$this->assertTrue(is_a($this->Adresse, 'Adresse'));
	}

	function testAdresseFind() {
		$this->Adresse->recursive = -1;
		$results = $this->Adresse->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Adresse' => array(
			'nummer'  => 1,
			'linje1'  => 'Lorem ipsum dolor sit amet',
			'linje2'  => 'Lorem ipsum dolor sit amet',
			'linje3'  => 'Lorem ipsum dolor sit amet',
			'merkes'  => 'Lorem ipsum dolor sit amet',
			'postnummer'  => 'Lo',
			'poststad'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>