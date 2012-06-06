<?php
/* Rekningar Test cases generated on: 2012-03-17 14:42:00 : 1331991720*/
App::uses('RekningarController', 'Controller');

/**
 * TestRekningarController *
 */
class TestRekningarController extends RekningarController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * RekningarController Test Case
 *
 */
class RekningarControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.rekning', 'app.mva_klasse', 'app.leverandor', 'app.pengeflytting', 'app.konto', 'app.kontotype', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.kaffeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.kaffesalgvekt', 'app.postsending', 'app.faktura_ubetalt', 'app.sist_purret_faktura', 'app.purring', 'app.purre_faktura', 'app.melde_faktura', 'app.kaffepris', 'app.kaffibrenning', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.lagerverdikonto', 'app.lagerverditype', 'app.budsjett_pengeflytting', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.rabatt', 'app.kaffeflyttingvekt', 'app.kaffelagerbeholdning', 'app.selgerbalanse', 'app.kontobalanse', 'app.kontoutskrift', 'app.bilag', 'app.pengeflytting_bilag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Rekningar = new TestRekningarController();
		$this->Rekningar->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rekningar);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

}
