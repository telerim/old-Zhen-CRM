<?php
App::uses('ContactsController', 'Controller');

/**
 * TestContactsController *
 */
class TestContactsController extends ContactsController {
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
 * ContactsController Test Case
 *
 */
class ContactsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.contact', 'app.contact_status', 'app.user', 'app.user_group', 'app.user_group_permission', 'app.deal', 'app.deal_status', 'app.deal_note', 'app.tag', 'app.contacts_tag', 'app.deals_tag', 'app.event', 'app.event_type', 'app.task_note', 'app.events_tag', 'app.events_user', 'app.login_token', 'app.contact_note');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contacts = new TestContactsController();
		$this->Contacts->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contacts);

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
