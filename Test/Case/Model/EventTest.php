<?php
App::uses('Event', 'Model');

/**
 * Event Test Case
 *
 */
class EventTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.event', 'app.event_type', 'app.task_note', 'app.tag', 'app.events_tag', 'app.user', 'app.events_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Event = ClassRegistry::init('Event');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Event);

		parent::tearDown();
	}

}
