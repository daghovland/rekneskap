<?php 
/* SVN FILE: $Id$ */
/* Pengeflytting Test cases generated on: 2010-01-01 20:01:38 : 1262372618*/
App::import('Model', 'Pengeflytting');

class PengeflyttingTestCase extends CakeTestCase {
	var $Pengeflytting = null;
	var $fixtures = array('app.pengeflytting', 'app.konto', 'app.konto', 'app.faktura');

	function startTest() {
		$this->Pengeflytting =& ClassRegistry::init('Pengeflytting');
	}

	function testPengeflyttingInstance() {
		$this->assertTrue(is_a($this->Pengeflytting, 'Pengeflytting'));
	}

	function testPengeflyttingFind() {
		$this->Pengeflytting->recursive = -1;
		$results = $this->Pengeflytting->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Pengeflytting' => array(
			'nummer'  => 1,
			'fra'  => 1,
			'til'  => 1,
			'kroner'  => 1,
			'Ã¸re'  => 1,
			'dato'  => '2010-01-01',
			'beskrivelse'  => 'Lorem ipsum dolor sit amet',
			'dekningsFaktura'  => 1,
			'oere'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>