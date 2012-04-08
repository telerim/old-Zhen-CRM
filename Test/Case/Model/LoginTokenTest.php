<?php
App::uses('LoginToken', 'Model');

/**
 * LoginToken Test Case
 *
 */
class LoginTokenTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.login_token', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LoginToken = ClassRegistry::init('LoginToken');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LoginToken);

		parent::tearDown();
	}

}
