<?php
App::uses('Newsletter', 'Model');

/**
 * Newsletter Test Case
 *
 */
class NewsletterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.newsletter',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Newsletter = ClassRegistry::init('Newsletter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Newsletter);

		parent::tearDown();
	}

}
