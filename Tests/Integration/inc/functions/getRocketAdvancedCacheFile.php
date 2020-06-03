<?php

namespace WP_Rocket\Tests\Integration\inc\functions;

use WP_Rocket\Tests\Integration\FilesystemTestCase;

/**
 * @covers ::get_rocket_advanced_cache_file
 * @uses   ::is_rocket_generate_caching_mobile_files
 * @uses   ::rocket_get_constant
 * @uses   ::rocket_direct_filesystem
 *
 * @group  AdvancedCache
 * @group  Functions
 * @group  Files
 */
class Test_GetRocketAdvancedCacheFile extends FilesystemTestCase {
	protected $path_to_test_data = '/inc/functions/getRocketAdvancedCacheFile.php';

	protected static $use_settings_trait = true;

	public function setUp() {
		parent::setUp();

		$this->setUpSettings();
	}

	/**
	 * @dataProvider providerTestData
	 */
	public function testShouldReturnExpectedContent( $settings, $expected ) {
		update_option(
			'wp_rocket_settings',
			array_merge( $this->old_settings, $this->config['settings'], $settings )
		);

		$actual = get_rocket_advanced_cache_file();

		echo "\n Actual: ........ \n";
		print_r( $actual );

		echo "\n Expected: ........ \n";
		print_r( $expected );
		exit;
		$this->assertSame( $expected, $actual );
	}
}
