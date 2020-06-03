<?php

namespace WP_Rocket\Tests\Unit\Inc;

use Brain\Monkey;
use WPMedia\PHPUnit\Unit\TestCase;

/**
 * @covers ::rocket_has_constant
 * @group Init
 * @group Constants
 */
class Test_RocketHasConstant extends TestCase {

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		require_once FILESYSTEM_MODULE_ROOT . 'inc/constants.php';
	}

	public function testShouldMockConstants() {
		Monkey\Functions\expect( 'rocket_has_constant' )
			->ordered()
			->once()
			->with( 'THIS_CONSTANT_DOES_NOT_EXIST' )
			->andReturn( true )
			->andAlsoExpectIt()
			->once()
			->with( 'FILESYSTEM_MODULE_ROOT' )
			->andReturn( false );

		$this->assertTrue( rocket_has_constant( 'THIS_CONSTANT_DOES_NOT_EXIST' ) );
		// This constant is defined in the test suite's bootstrapping.
		$this->assertFalse( rocket_has_constant( 'FILESYSTEM_MODULE_ROOT' ) );
	}

	public function testShouldReturnFalseWhenConstantNotDefined() {
		$this->assertFalse( rocket_has_constant( 'THIS_CONSTANT_DOES_NOT_EXIST' ) );
	}

	public function testShouldReturnTrueWhenConstantIsDefined() {
		$this->assertTrue( rocket_has_constant( 'FILESYSTEM_MODULE_ROOT' ) );
		$this->assertTrue( rocket_has_constant( 'FILESYSTEM_MODULE_TESTS_FIXTURES_DIR' ) );
	}
}
