<?php

namespace WP_Rocket\Tests\Integration\inc\functions;

use WP_Rocket\Tests\Integration\FilesystemTestCase;

/**
 * @covers ::rocket_clean_cache_dir
 *
 * @uses  ::rocket_direct_filesystem
 * @uses  ::_rocket_get_wp_rocket_cache_path
 * @uses  ::_rocket_get_cache_path_iterator
 * @uses  ::rocket_rrmdir
 *
 * @group Functions
 */
class Test_RocketCleanCacheDir extends FilesystemTestCase {
	protected $path_to_test_data = '/inc/functions/rocketCleanCacheDir.php';

	/**
	 * @dataProvider providerTestData
	 */
	public function testShouldReturnValidConfigFileName( $expected ) {
		$this->generateEntriesShouldExistAfter( $expected['cleaned'] );

		rocket_clean_cache_dir();

		$this->checkEntriesDeleted( $expected['cleaned'] );
		$this->checkShouldNotDeleteEntries();
	}
}
