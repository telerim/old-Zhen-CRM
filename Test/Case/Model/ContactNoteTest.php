<?php
App::uses('ContactNote', 'Model');

/**
 * ContactNote Test Case
 *
 */
class ContactNoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.contact_note', 'app.contact');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContactNote = ClassRegistry::init('ContactNote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContactNote);

		parent::tearDown();
	}

}
