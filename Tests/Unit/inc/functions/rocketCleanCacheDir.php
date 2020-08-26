<?php

namespace WP_Rocket\Tests\Unit\inc\functions;

use Brain\Monkey\Actions;
use Brain\Monkey\Functions;
use WP_Rocket\Tests\Unit\FilesystemTestCase;

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
		$fs = $this->filesystem;
		$this->generateEntriesShouldExistAfter( $expected['cleaned'] );

		Functions\when( 'rocket_rrmdir' )
			->alias( function ( $path ) use ( $fs ) {
				$fs->rmdir( $path, true );
			} );

		Actions\expectDone( 'before_rocket_clean_cache_dir' )->once();
		Actions\expectDone( 'after_rocket_clean_cache_dir' )->once();

		rocket_clean_cache_dir();

		$this->checkEntriesDeleted( $expected['cleaned'] );
		$this->checkShouldNotDeleteEntries();
	}
}
