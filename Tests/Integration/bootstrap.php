<?php

namespace WP_Rocket\Tests\Integration;

use WC_Install;
use WPMedia\PHPUnit\BootstrapManager;
use function Patchwork\redefine;

define( 'FILESYSTEM_MODULE_ROOT', dirname( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR );
define( 'FILESYSTEM_MODULE_TESTS_FIXTURES_DIR', dirname( __DIR__ ) . '/Fixtures' );
define( 'FILESYSTEM_MODULE_TESTS_DIR', __DIR__ );
define( 'FILESYSTEM_MODULE_IS_TESTING', true );

// Manually load files being tested.
tests_add_filter(
	'muplugins_loaded',
	function() {
		// Set the path and URL to our virtual filesystem.
		define( 'FILESYSTEM_MODULE_CACHE_ROOT_PATH', 'vfs://public/wp-content/cache/' );
		define( 'FILESYSTEM_MODULE_CACHE_ROOT_URL', 'http://example.org/wp-content/cache/' );

		// Load the files.
		$originals = [
			'inc/constants.php',
			'inc/functions/api.php',
			'inc/functions/files.php',
			'inc/functions/formatting.php',
			'inc/functions/i18n.php',
			'inc/functions/options.php',
		];

		foreach ( $originals as $file ) {
			require_once FILESYSTEM_MODULE_ROOT . $file;
		}
	}
);
