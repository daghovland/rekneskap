<?php
App::uses('TingingarController', 'Controller');

/**
 * TestTingingarController *
 */
class TestTingingarController extends TingingarController {
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
 * TingingarController Test Case
 *
 */
class TingingarControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tinging', 'app.kunde', 'app.adresse', 'app.faktura', 'app.kaffesalg', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.konto', 'app.kontotype', 'app.kontobalanse', 'app.pengeflytting', 'app.kaffibrenning', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.kaffeflytting', 'app.kaffepris', 'app.rabatt', 'app.kaffeflyttingvekt', 'app.lagerverdikonto', 'app.lagerverditype', 'app.budsjett_pengeflytting', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.postsending', 'app.bilag', 'app.pengeflytting_bilag', 'app.kontoutskrift', 'app.kaffelagerbeholdning', 'app.selgerbalanse', 'app.kaffesalgvekt', 'app.faktura_ubetalt', 'app.sist_purret_faktura', 'app.purring', 'app.purre_faktura', 'app.melde_faktura');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tingingar = new TestTingingarController();
		$this->Tingingar->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tingingar);

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
