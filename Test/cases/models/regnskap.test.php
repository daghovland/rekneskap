<?php 
/* SVN FILE: $Id$ */
/* Regnskap Test cases generated on: 2010-01-18 23:01:03 : 1263853323*/
App::import('Model', 'Regnskap');

class RegnskapTestCase extends CakeTestCase {
	var $Regnskap = null;
	var $fixtures = array('app.regnskap', 'app.start_saldoer');

	function startTest() {
		$this->Regnskap =& ClassRegistry::init('Regnskap');
	}

	function testRegnskapInstance() {
		$this->assertTrue(is_a($this->Regnskap, 'Regnskap'));
	}

	function testRegnskapFind() {
		$this->Regnskap->recursive = -1;
		$results = $this->Regnskap->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Regnskap' => array(
			'id'  => 1,
			'start'  => '2010-01-18 23:22:03',
			'slutt'  => '2010-01-18 23:22:03',
			'beskrivelse'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>