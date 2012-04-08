<?php
App::uses('UserGroupPermissionsController', 'Controller');

/**
 * TestUserGroupPermissionsController *
 */
class TestUserGroupPermissionsController extends UserGroupPermissionsController {
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
 * UserGroupPermissionsController Test Case
 *
 */
class UserGroupPermissionsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user_group_permission', 'app.user_group', 'app.user', 'app.contact', 'app.contact_status', 'app.contact_note', 'app.deal', 'app.deal_status', 'app.deal_note', 'app.tag', 'app.contacts_tag', 'app.deals_tag', 'app.event', 'app.event_type', 'app.task_note', 'app.events_tag', 'app.events_user', 'app.login_token');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserGroupPermissions = new TestUserGroupPermissionsController();
		$this->UserGroupPermissions->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserGroupPermissions);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}
/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}
/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}
/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}
}
