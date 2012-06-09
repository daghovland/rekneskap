<?php
App::uses('KaffityperController', 'Controller');

/**
 * TestKaffityperController *
 */
class TestKaffityperController extends KaffityperController {
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
 * KaffityperController Test Case
 *
 */
class KaffityperControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.kaffitype', 'app.kaffepris', 'app.kaffibrenning', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.pengeflytting', 'app.konto', 'app.kontotype', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.kaffeflytting', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.kaffesalgvekt', 'app.postsending', 'app.faktura_ubetalt', 'app.sist_purret_faktura', 'app.purring', 'app.purre_faktura', 'app.melde_faktura', 'app.rabatt', 'app.kaffeflyttingvekt', 'app.kaffelagerbeholdning', 'app.selgerbalanse', 'app.kontobalanse', 'app.kontoutskrift', 'app.bilag', 'app.pengeflytting_bilag', 'app.lagerverdikonto', 'app.lagerverditype', 'app.budsjett_pengeflytting', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.kaffiinnkjop');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Kaffityper = new TestKaffityperController();
		$this->Kaffityper->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Kaffityper);

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
