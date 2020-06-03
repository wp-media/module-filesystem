<?php

namespace WP_Rocket\Tests;

/**
 * The original files need to loaded into memory before we mock them with Patchwork. Add files here before the unit
 * tests start.
 *
 * @since 3.5
 */
function load_polyfills_before_mocking() {
	$polyfills = [
		'api.php',
		'constants.php',
		'formatting.php',
		'i18n.php',
		'options.php',
	];

	foreach ( $polyfills as $file ) {
		require_once FILESYSTEM_MODULE_TESTS_FIXTURES_DIR . '/polyfills/' . $file;
	}
}

/**
 * The original files need to loaded into memory before we mock them with Patchwork. Add files here before the unit
 * tests start.
 *
 * @since 3.5
 */
function load_original_files_before_mocking() {
	// Load the files.
	$originals = [
		'inc/functions/files.php',
	];

	foreach ( $originals as $file ) {
		require_once FILESYSTEM_MODULE_ROOT . $file;
	}
}
