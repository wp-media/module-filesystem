<?php

namespace WP_Rocket\Tests\Unit;

use function WP_Rocket\Tests\load_original_files_before_mocking;
use function WP_Rocket\Tests\load_polyfills_before_mocking;

define( 'FILESYSTEM_MODULE_ROOT', dirname( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR );
define( 'WP_ROCKET_PLUGIN_ROOT', FILESYSTEM_MODULE_ROOT );
define( 'FILESYSTEM_MODULE_TESTS_FIXTURES_DIR', dirname( __DIR__ ) . '/Fixtures' );
define( 'WP_ROCKET_TESTS_FIXTURES_DIR', FILESYSTEM_MODULE_TESTS_FIXTURES_DIR );
define( 'FILESYSTEM_MODULE_TESTS_DIR', __DIR__ );
define( 'WP_ROCKET_TESTS_DIR', __DIR__ );

require_once dirname( __DIR__ ) . '/bootstrap-functions.php';

load_polyfills_before_mocking();
load_original_files_before_mocking();
