<?php 
/* SVN FILE: $Id$ */
/* Lagerverdiflytting Test cases generated on: 2010-04-10 21:04:04 : 1270926904*/
App::import('Model', 'Lagerverdiflytting');

class LagerverdiflyttingTestCase extends CakeTestCase {
	var $Lagerverdiflytting = null;
	var $fixtures = array('app.lagerverdiflytting', 'app.pengeflytting', 'app.kaffeflytting', 'app.kaffiimport', 'app.kaffesalg', 'app.lagerverdikonto', 'app.lagerverdikonto');

	function startTest() {
		$this->Lagerverdiflytting =& ClassRegistry::init('Lagerverdiflytting');
	}

	function testLagerverdiflyttingInstance() {
		$this->assertTrue(is_a($this->Lagerverdiflytting, 'Lagerverdiflytting'));
	}

	function testLagerverdiflyttingFind() {
		$this->Lagerverdiflytting->recursive = -1;
		$results = $this->Lagerverdiflytting->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Lagerverdiflytting' => array(
			'id'  => 1,
			'fra'  => 1,
			'til'  => 1,
			'kroner'  => 1,
			'oere'  => 1,
			'dato'  => '2010-04-10 21:15:04',
			'kommentar'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-04-10 21:15:04',
			'modified'  => '2010-04-10 21:15:04',
			'pengeflytting_id'  => 1,
			'kaffeflytting_id'  => 1,
			'kaffiimport_id'  => 1,
			'kaffesalg_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>