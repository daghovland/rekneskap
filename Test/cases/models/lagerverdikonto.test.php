<?php 
/* SVN FILE: $Id$ */
/* Lagerverdikonto Test cases generated on: 2010-04-10 21:04:26 : 1270926746*/
App::import('Model', 'Lagerverdikonto');

class LagerverdikontoTestCase extends CakeTestCase {
	var $Lagerverdikonto = null;
	var $fixtures = array('app.lagerverdikonto', 'app.lagerverditype');

	function startTest() {
		$this->Lagerverdikonto =& ClassRegistry::init('Lagerverdikonto');
	}

	function testLagerverdikontoInstance() {
		$this->assertTrue(is_a($this->Lagerverdikonto, 'Lagerverdikonto'));
	}

	function testLagerverdikontoFind() {
		$this->Lagerverdikonto->recursive = -1;
		$results = $this->Lagerverdikonto->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Lagerverdikonto' => array(
			'id'  => 1,
			'navn'  => 'Lorem ipsum dolor sit amet',
			'lagerverditype_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>