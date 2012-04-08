<?php
App::uses('TaskNote', 'Model');

/**
 * TaskNote Test Case
 *
 */
class TaskNoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.task_note', 'app.event', 'app.event_type', 'app.tag', 'app.contact', 'app.contact_status', 'app.user', 'app.contact_note', 'app.deal', 'app.deal_status', 'app.deal_note', 'app.deals_tag', 'app.contacts_tag', 'app.events_tag', 'app.events_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TaskNote = ClassRegistry::init('TaskNote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TaskNote);

		parent::tearDown();
	}

}
