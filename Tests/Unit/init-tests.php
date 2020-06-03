<?php
/**
 * Initializes the wp-media/phpunit handler, which then calls the rocket unit test suite.
 */

defined('WPMEDIA_PHPUNIT_ROOT_DIR') || define( 'WPMEDIA_PHPUNIT_ROOT_DIR', dirname( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR );
defined('WPMEDIA_PHPUNIT_ROOT_TEST_DIR') || define( 'WPMEDIA_PHPUNIT_ROOT_TEST_DIR', __DIR__ );

require_once WPMEDIA_PHPUNIT_ROOT_DIR . '/vendor/wp-media/phpunit/Unit/bootstrap.php';

define( 'WPMEDIA_IS_TESTING', true ); // Used by wp-media/{package}.
