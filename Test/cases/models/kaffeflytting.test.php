<?php 
/* SVN FILE: $Id$ */
/* Kaffeflytting Test cases generated on: 2010-01-02 00:01:12 : 1262388132*/
App::import('Model', 'Kaffeflytting');

class KaffeflyttingTestCase extends CakeTestCase {
	var $Kaffeflytting = null;
	var $fixtures = array('app.kaffeflytting');

	function startTest() {
		$this->Kaffeflytting =& ClassRegistry::init('Kaffeflytting');
	}

	function testKaffeflyttingInstance() {
		$this->assertTrue(is_a($this->Kaffeflytting, 'Kaffeflytting'));
	}

	function testKaffeflyttingFind() {
		$this->Kaffeflytting->recursive = -1;
		$results = $this->Kaffeflytting->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffeflytting' => array(
			'nummer'  => 1,
			'type'  => 1,
			'antall'  => 1,
			'fra'  => 1,
			'beskrivelse'  => 'Lorem ipsum dolor sit amet',
			'til'  => 1,
			'dato'  => '2010-01-02',
			'pengeflytting'  => 1,
			'fralagertype'  => 1,
			'tillagertype'  => 1,
			'ansvarlig'  => 1,
			'faktura'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>