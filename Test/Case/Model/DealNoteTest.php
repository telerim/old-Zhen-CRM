<?php
App::uses('DealNote', 'Model');

/**
 * DealNote Test Case
 *
 */
class DealNoteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.deal_note', 'app.deal');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DealNote = ClassRegistry::init('DealNote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DealNote);

		parent::tearDown();
	}

}
