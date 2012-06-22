<?php
/* Leverandor Test cases generated on: 2012-02-22 21:29:29 : 1329942569*/
App::uses('Leverandor', 'Model');

/**
 * Leverandor Test Case
 *
 */
class LeverandorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.leverandor', 'app.rekning');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Leverandor = ClassRegistry::init('Leverandor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Leverandor);

		parent::tearDown();
	}

}
