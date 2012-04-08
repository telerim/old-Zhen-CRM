<?php
App::uses('EventsTag', 'Model');

/**
 * EventsTag Test Case
 *
 */
class EventsTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.events_tag', 'app.event', 'app.event_type', 'app.task_note', 'app.tag', 'app.user', 'app.events_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsTag = ClassRegistry::init('EventsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsTag);

		parent::tearDown();
	}

}
