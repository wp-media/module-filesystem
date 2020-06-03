<?php

namespace WP_Rocket\Tests\Unit\Inc;

use Brain\Monkey;
use WPMedia\PHPUnit\Unit\TestCase;

/**
 * @covers ::rocket_has_constant
 * @uses  ::rocket_get_constant
 * @group Init
 * @group Constants
 */
class Test_RocketGetConstant extends TestCase {

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		require_once FILESYSTEM_MODULE_ROOT . 'inc/constants.php';
	}

	public function testShouldMockConstants() {
		Monkey\Functions\expect( 'rocket_get_constant' )
			->ordered()
			->once()
			->with( 'THIS_CONSTANT_DOES_NOT_EXIST' )
			->andReturn( 'Hello World' )
			->andAlsoExpectIt()
			->once()
			->with( 'FILESYSTEM_MODULE_ROOT' )
			->andReturn( 'Hello World' );

		$this->assertSame( 'Hello World', rocket_get_constant( 'THIS_CONSTANT_DOES_NOT_EXIST' ) );
		$this->assertSame( 'Hello World', rocket_get_constant( 'FILESYSTEM_MODULE_ROOT' ) );
	}

	public function testShouldReturnDefaultWhenConstantNotDefined() {
		$this->assertNull( rocket_get_constant( 'THIS_CONSTANT_DOES_NOT_EXIST' ) );
		$this->assertSame( 'Hello World', rocket_get_constant( 'THIS_CONSTANT_DOES_NOT_EXIST', 'Hello World' ) );
	}

	public function testShouldReturnConstantWhenDefined() {
		$this->assertSame( FILESYSTEM_MODULE_ROOT, rocket_get_constant( 'FILESYSTEM_MODULE_ROOT' ) );
		$this->assertSame( FILESYSTEM_MODULE_TESTS_FIXTURES_DIR, rocket_get_constant( 'FILESYSTEM_MODULE_TESTS_FIXTURES_DIR' ) );
	}
}
