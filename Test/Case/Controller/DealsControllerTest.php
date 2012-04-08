<?php
App::uses('DealsController', 'Controller');

/**
 * TestDealsController *
 */
class TestDealsController extends DealsController {
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
 * DealsController Test Case
 *
 */
class DealsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.deal', 'app.contact', 'app.contact_status', 'app.user', 'app.user_group', 'app.user_group_permission', 'app.login_token', 'app.event', 'app.event_type', 'app.task_note', 'app.tag', 'app.contacts_tag', 'app.deals_tag', 'app.events_tag', 'app.events_user', 'app.contact_note', 'app.deal_status', 'app.deal_note');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Deals = new TestDealsController();
		$this->Deals->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Deals);

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
