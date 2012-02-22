<?php
/* MvaKlasses Test cases generated on: 2012-02-22 21:34:41 : 1329942881*/
App::uses('MvaKlasses', 'Controller');

/**
 * TestMvaKlasses *
 */
class TestMvaKlasses extends MvaKlasses {
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
 * MvaKlasses Test Case
 *
 */
class MvaKlassesTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MvaKlasses = new TestMvaKlasses();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MvaKlasses);

		parent::tearDown();
	}

}
