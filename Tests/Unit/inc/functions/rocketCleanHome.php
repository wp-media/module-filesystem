<?php

namespace WP_Rocket\Tests\Unit\inc\functions;

use Brain\Monkey\Actions;
use Brain\Monkey\Filters;
use Brain\Monkey\Functions;
use WP_Rocket\Tests\Unit\FilesystemTestCase;
use stdClass;

/**
 * @covers ::rocket_clean_home
 * @uses  ::get_rocket_i18n_home_url
 * @uses  ::rocket_get_parse_url
 * @uses  ::_rocket_get_wp_rocket_cache_path()
 * @uses  ::rocket_direct_filesystem
 * @uses  ::_rocket_get_cache_dirs
 * @uses  ::rocket_rrmdir
 *
 * @group Functions
 */
class Test_RocketCleanHome extends FilesystemTestCase {
	protected $path_to_test_data = '/inc/functions/rocketCleanHome.php';

	/**
	 * @dataProvider providerTestData
	 */
	public function testShouldCleanHome( $i18n, $home_url, $expected ) {
		$GLOBALS['wp_rewrite']                  = new stdClass();
		$GLOBALS['wp_rewrite']->pagination_base = 'page';

		Functions\expect( 'get_rocket_i18n_home_url' )
			->once()
			->with( $i18n['lang'] )
			->andReturn( $home_url );
		Functions\expect( 'get_rocket_parse_url' )
			->once()
			->with( $home_url )
			->andReturnUsing(
				function ( $url, $component = - 1 ) {
					$url         = parse_url( $url, $component );
					$url['path'] = isset( $url['path'] ) ? $url['path'] : '';

					return $url;
				},
				$home_url
			);
		Functions\expect( 'rocket_direct_filesystem' )->never();

		Filters\expectApplied( 'rocket_url_no_dots' )
			->once()
			->with( false )
			->andReturnFirstArg();
		Filters\expectApplied( 'rocket_clean_home_root' )->once();

		Actions\expectDone( 'before_rocket_clean_home' )->once();
		Actions\expectDone( 'after_rocket_clean_home' )->once();

		$this->generateEntriesShouldExistAfter( $expected['cleaned'] );

		rocket_clean_home( $i18n['lang'], $this->filesystem );

		$this->checkEntriesDeleted( $expected['cleaned'] );
		$this->checkShouldNotDeleteEntries();
	}
}
