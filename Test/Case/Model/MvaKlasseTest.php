<?php
/* MvaKlasse Test cases generated on: 2012-02-22 21:28:50 : 1329942530*/
App::uses('MvaKlasse', 'Model');

/**
 * MvaKlasse Test Case
 *
 */
class MvaKlasseTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.mva_klasse', 'app.rekning');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MvaKlasse = ClassRegistry::init('MvaKlasse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MvaKlasse);

		parent::tearDown();
	}

}
