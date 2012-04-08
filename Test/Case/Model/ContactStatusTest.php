<?php
App::uses('ContactStatus', 'Model');

/**
 * ContactStatus Test Case
 *
 */
class ContactStatusTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.contact_status', 'app.contact');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactStatus = ClassRegistry::init('ContactStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactStatus);

		parent::tearDown();
	}

}
