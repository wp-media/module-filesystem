<?php

namespace WP_Rocket\Tests\Unit;

define( 'FILESYSTEM_MODULE_ROOT', dirname( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR );
define( 'FILESYSTEM_MODULE_TESTS_FIXTURES_DIR', dirname( __DIR__ ) . '/Fixtures' );
define( 'FILESYSTEM_MODULE_TESTS_DIR', __DIR__ );
define( 'FILESYSTEM_MODULE_IS_TESTING', true );

// Set the path and URL to our virtual filesystem.
define( 'FILESYSTEM_MODULE_CACHE_ROOT_PATH', 'vfs://public/wp-content/cache/' );
define( 'FILESYSTEM_MODULE_CACHE_ROOT_URL', 'vfs://public/wp-content/cache/' );

/**
 * The original files need to loaded into memory before we mock them with Patchwork. Add files here before the unit
 * tests start.
 *
 * @since 3.5
 */
function load_original_functions_before_mocking() {
	$originals = [
		'inc/constants.php',
		'inc/functions/api.php',
		'inc/functions/files.php',
		'inc/functions/i18n.php',
		'inc/functions/options.php',
	];

	foreach ( $originals as $file ) {
		require_once FILESYSTEM_MODULE_ROOT . $file;
	}
}

load_original_functions_before_mocking();
