<?php
App::uses('Deal', 'Model');

/**
 * Deal Test Case
 *
 */
class DealTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.deal', 'app.contact', 'app.contact_status', 'app.user', 'app.contact_note', 'app.tag', 'app.contacts_tag', 'app.deal_status', 'app.deal_note', 'app.deals_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Deal = ClassRegistry::init('Deal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Deal);

		parent::tearDown();
	}

}
