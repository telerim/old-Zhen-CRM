<?php
App::uses('DealStatus', 'Model');

/**
 * DealStatus Test Case
 *
 */
class DealStatusTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.deal_status', 'app.deal');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DealStatus = ClassRegistry::init('DealStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DealStatus);

		parent::tearDown();
	}

}
