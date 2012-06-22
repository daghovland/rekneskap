<?php
/* Rekning Test cases generated on: 2012-02-22 21:37:37 : 1329943057*/
App::uses('Rekning', 'Model');

/**
 * Rekning Test Case
 *
 */
class RekningTestCase extends CakeTestCase {
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

		$this->Rekning = ClassRegistry::init('Rekning');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rekning);

		parent::tearDown();
	}

}
