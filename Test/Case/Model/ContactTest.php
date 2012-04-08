<?php
App::uses('Contact', 'Model');

/**
 * Contact Test Case
 *
 */
class ContactTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.contact', 'app.contact_status', 'app.user', 'app.contact_note', 'app.deal', 'app.tag', 'app.contacts_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contact = ClassRegistry::init('Contact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contact);

		parent::tearDown();
	}

}
