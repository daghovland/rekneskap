<?php 
/* SVN FILE: $Id$ */
/* Kaffiinnkjop Test cases generated on: 2010-06-15 13:37:08 : 1276601828*/
App::import('Model', 'Kaffiinnkjop');

class KaffiinnkjopTestCase extends CakeTestCase {
	var $Kaffiinnkjop = null;
	var $fixtures = array('app.kaffiinnkjop', 'app.kaffibrenning', 'app.kaffitype', 'app.pengeflytting', 'app.kaffeflytting');

	function startTest() {
		$this->Kaffiinnkjop =& ClassRegistry::init('Kaffiinnkjop');
	}

	function testKaffiinnkjopInstance() {
		$this->assertTrue(is_a($this->Kaffiinnkjop, 'Kaffiinnkjop'));
	}

	function testKaffiinnkjopFind() {
		$this->Kaffiinnkjop->recursive = -1;
		$results = $this->Kaffiinnkjop->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Kaffiinnkjop' => array(
			'id'  => 1,
			'kaffibrenning_id'  => 1,
			'kaffitype_id'  => 1,
			'kommentar'  => 'Lorem ipsum dolor sit amet',
			'dato'  => '2010-06-15 13:36:57',
			'created'  => '2010-06-15 13:36:57',
			'modified'  => '2010-06-15 13:36:57',
			'pengeflytting_id'  => 1,
			'kaffeflytting_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>