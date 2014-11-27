<?php 
/* SVN FILE: $Id$ */
/* Faktura Test cases generated on: 2010-01-01 20:01:58 : 1262374918*/
App::import('Model', 'Faktura');

class FakturaTestCase extends CakeTestCase {
	var $Faktura = null;
	var $fixtures = array('app.faktura', 'app.kunde', 'app.adresse', 'app.pengeflytting', 'app.kaffeflytting');

	function startTest() {
		$this->Faktura =& ClassRegistry::init('Faktura');
	}

	function testFakturaInstance() {
		$this->assertTrue(is_a($this->Faktura, 'Faktura'));
	}

	function testFakturaFind() {
		$this->Faktura->recursive = -1;
		$results = $this->Faktura->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Faktura' => array(
			'nummer'  => 1,
			'kunde'  => 1,
			'faktura_dato'  => '2010-01-01',
			'betaling'  => 1,
			'betalings_frist'  => '2010-01-01',
			'melding'  => 'Lorem ipsum dolor sit amet',
			'kroner'  => 1,
			'adresse'  => 1,
			'mva'  => 1,
			'totalpris'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>