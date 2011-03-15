<?php 
/* SVN FILE: $Id$ */
/* FakturaUbetalt Test cases generated on: 2010-05-21 14:05:02 : 1274443562*/
App::import('Model', 'FakturaUbetalt');

class FakturaUbetaltTestCase extends CakeTestCase {
	var $FakturaUbetalt = null;
	var $fixtures = array('app.faktura_ubetalt', 'app.faktura');

	function startTest() {
		$this->FakturaUbetalt =& ClassRegistry::init('FakturaUbetalt');
	}

	function testFakturaUbetaltInstance() {
		$this->assertTrue(is_a($this->FakturaUbetalt, 'FakturaUbetalt'));
	}

	function testFakturaUbetaltFind() {
		$this->FakturaUbetalt->recursive = -1;
		$results = $this->FakturaUbetalt->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('FakturaUbetalt' => array(
			'faktura_id'  => 1,
			'mangler'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>