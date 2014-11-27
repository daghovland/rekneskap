<?php 
/* SVN FILE: $Id$ */
/* Kaffiimport Test cases generated on: 2010-04-11 15:04:35 : 1270992275*/
App::import('Model', 'Kaffiimport');

class KaffiimportTestCase extends CakeTestCase {
	var $Kaffiimport = null;
	var $fixtures = array('app.kaffiimport', 'app.kaffibrenning', 'app.lagerverdiflytting');

	function startTest() {
		$this->Kaffiimport =& ClassRegistry::init('Kaffiimport');
	}

	function testKaffiimportInstance() {
		$this->assertTrue(is_a($this->Kaffiimport, 'Kaffiimport'));
	}

	function testKaffiimportFind() {
		$this->Kaffiimport->recursive = -1;
		$results = $this->Kaffiimport->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffiimport' => array(
			'id'  => 1,
			'kooperativ'  => 'Lorem ipsum dolor sit amet',
			'transportbetaling'  => 1,
			'forskuddsbetaling'  => 1,
			'restbetaling'  => 1,
			'kilo'  => 1,
			'sekker'  => 1,
			'kontrakt'  => 1,
			'created'  => '2010-04-11 15:24:35',
			'modified'  => '2010-04-11 15:24:35',
			'kommentar'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		));
		$this->assertEqual($results, $expected);
	}
}
?>