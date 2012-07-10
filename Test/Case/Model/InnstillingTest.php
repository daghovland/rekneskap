<?php
App::uses('Innstilling', 'Model');

/**
 * Innstilling Test Case
 *
 */
class InnstillingTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.innstilling');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Innstilling = ClassRegistry::init('Innstilling');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Innstilling);

		parent::tearDown();
	}

}
