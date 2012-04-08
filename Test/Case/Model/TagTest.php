<?php
App::uses('Tag', 'Model');

/**
 * Tag Test Case
 *
 */
class TagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tag', 'app.contact', 'app.contact_status', 'app.user', 'app.contact_note', 'app.deal', 'app.deal_status', 'app.deal_note', 'app.deals_tag', 'app.contacts_tag', 'app.event', 'app.event_type', 'app.task_note', 'app.events_tag', 'app.events_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tag = ClassRegistry::init('Tag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tag);

		parent::tearDown();
	}

}
