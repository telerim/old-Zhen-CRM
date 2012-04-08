<?php
App::uses('ContactsTag', 'Model');

/**
 * ContactsTag Test Case
 *
 */
class ContactsTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.contacts_tag', 'app.contact', 'app.contact_status', 'app.user', 'app.contact_note', 'app.deal', 'app.tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactsTag = ClassRegistry::init('ContactsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactsTag);

		parent::tearDown();
	}

}
