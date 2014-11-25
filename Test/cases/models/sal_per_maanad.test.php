<?php 
/* SVN FILE: $Id$ */
/* SalPerMaanad Test cases generated on: 2010-04-28 22:04:52 : 1272486112*/
App::import('Model', 'SalPerMaanad');

class SalPerMaanadTestCase extends CakeTestCase {
	var $SalPerMaanad = null;
	var $fixtures = array('app.sal_per_maanad', 'app.kaffepris');

	function startTest() {
		$this->SalPerMaanad =& ClassRegistry::init('SalPerMaanad');
	}

	function testSalPerMaanadInstance() {
		$this->assertTrue(is_a($this->SalPerMaanad, 'SalPerMaanad'));
	}

	function testSalPerMaanadFind() {
		$this->SalPerMaanad->recursive = -1;
		$results = $this->SalPerMaanad->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('SalPerMaanad' => array(
			'year'  => 1,
			'month'  => 1,
			'solgt'  => 1,
			'kaffepris_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>