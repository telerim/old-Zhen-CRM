<?php
App::uses('UserGroup', 'Model');

/**
 * UserGroup Test Case
 *
 */
class UserGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user_group', 'app.user_group_permission', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserGroup = ClassRegistry::init('UserGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserGroup);

		parent::tearDown();
	}

}
