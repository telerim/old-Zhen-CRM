<?php
App::uses('EventsUser', 'Model');

/**
 * EventsUser Test Case
 *
 */
class EventsUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.events_user', 'app.event', 'app.event_type', 'app.task_note', 'app.tag', 'app.events_tag', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsUser = ClassRegistry::init('EventsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsUser);

		parent::tearDown();
	}

}
