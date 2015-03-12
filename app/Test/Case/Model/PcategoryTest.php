<?php
App::uses('Pcategory', 'Model');

/**
 * Pcategory Test Case
 *
 */
class PcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pcategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pcategory = ClassRegistry::init('Pcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pcategory);

		parent::tearDown();
	}

}
