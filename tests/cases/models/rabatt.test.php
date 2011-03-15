<?php 
/* SVN FILE: $Id$ */
/* Rabatt Test cases generated on: 2010-01-20 13:01:07 : 1263990127*/
App::import('Model', 'Rabatt');

class RabattTestCase extends CakeTestCase {
	var $Rabatt = null;
	var $fixtures = array('app.rabatt', 'app.kaffepris', 'app.kaffesalg');

	function startTest() {
		$this->Rabatt =& ClassRegistry::init('Rabatt');
	}

	function testRabattInstance() {
		$this->assertTrue(is_a($this->Rabatt, 'Rabatt'));
	}

	function testRabattFind() {
		$this->Rabatt->recursive = -1;
		$results = $this->Rabatt->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Rabatt' => array(
			'id'  => 1,
			'type'  => 1,
			'pris'  => 1,
			'beskrivelse'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>