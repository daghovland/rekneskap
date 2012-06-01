<?php
App::uses('Tinging', 'Model');

/**
 * Tinging Test Case
 *
 */
class TingingTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tinging');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tinging = ClassRegistry::init('Tinging');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tinging);

		parent::tearDown();
	}

}
