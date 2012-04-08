<?php
App::uses('DealsTag', 'Model');

/**
 * DealsTag Test Case
 *
 */
class DealsTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.deals_tag', 'app.deal', 'app.contact', 'app.contact_status', 'app.user', 'app.contact_note', 'app.tag', 'app.contacts_tag', 'app.deal_status', 'app.deal_note');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DealsTag = ClassRegistry::init('DealsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DealsTag);

		parent::tearDown();
	}

}
