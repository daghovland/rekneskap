<?php
/* PurreFaktura Test cases generated on: 2011-11-15 15:30:07 : 1321367407*/
App::uses('PurreFaktura', 'Model');

/**
 * PurreFaktura Test Case
 *
 */
class PurreFakturaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.purre_faktura', 'app.faktura', 'app.kunde', 'app.adresse', 'app.kaffesalg', 'app.selger', 'app.rolle', 'app.kaffelager', 'app.lagertype', 'app.konto', 'app.kontotype', 'app.kontobalanse', 'app.pengeflytting', 'app.kaffibrenning', 'app.kaffiimport', 'app.kaffiimport_info', 'app.lagerverdiflytting', 'app.kaffeflytting', 'app.kaffepris', 'app.rabatt', 'app.kaffeflyttingvekt', 'app.lagerverdikonto', 'app.lagerverditype', 'app.budsjett_pengeflytting', 'app.kaffibrenningbonneverdi', 'app.kaffibrenningutgiftarsum', 'app.postsending', 'app.bilag', 'app.pengeflytting_bilag', 'app.kontoutskrift', 'app.kaffelagerbeholdning', 'app.selgerbalanse', 'app.kaffesalgvekt', 'app.faktura_ubetalt', 'app.purring');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PurreFaktura = ClassRegistry::init('PurreFaktura');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PurreFaktura);

		parent::tearDown();
	}

}
