<?php
return [
	'vfs_dir' => 'wp-content/cache/wp-rocket/',

	'structure' => [
		'wp-content' => [
			'cache' => [
				'wp-rocket' => [
					'test.html'                  => '',
					'example.org'                => [
						'index.html_gzip' => '',
						'index.html'      => '',
						'index-test.html' => '',
						'.mobile-active'  => '',
						'.no-webp'        => '',
						'page'            => [
							'1' => [
								'index.html_gzip' => '',
								'index.html'      => '',
							],
							'2' => [
								'index.html_gzip' => '',
								'index.html'      => '',
							],
						]
					],
					'example.org-wpmedia-123456' => [
						'index.html_gzip' => '',
					],
					'example.org-tester-987654'  => [
						'index.html_gzip' => '',
					],

					'baz.example.org'             => [
						'index.html_gzip' => '',
					],
					'baz.example.org-baz1-123456' => [
						'index.html_gzip' => '',
					],
					'baz.example.org-baz2-987654' => [
						'index.html_gzip' => '',
					],
					'baz.example.org-baz3-456789' => [
						'index.html_gzip' => '',
					],

					'wp.baz.example.org'               => [
						'index.html_gzip' => '',
					],
					'wp.baz.example.org-wpbaz1-123456' => [
						'index.html_gzip' => '',
					],

					'example.org#fr' => [
						'index.html_gzip' => '',
					],
				],
			],
		],
	],

	'test_data' => [
		'testShouldCleanCacheDir' => [
			'expected' => [
				'cleaned' => [
					'vfs://public/wp-content/cache/test.html'                        => null,
					'vfs://public/wp-content/cache/example.org'                      => null,
					'vfs://public/wp-content/cache/example.org-wpmedia-123456'       => null,
					'vfs://public/wp-content/cache/example.org-tester-987654'        => null,
					'vfs://public/wp-content/cache/baz.example.org'                  => null,
					'vfs://public/wp-content/cache/baz.example.org-baz1-123456'      => null,
					'vfs://public/wp-content/cache/baz.example.org-baz2-987654'      => null,
					'vfs://public/wp-content/cache/baz.example.org-baz3-456789'      => null,
					'vfs://public/wp-content/cache/wp.baz.example.org'               => null,
					'vfs://public/wp-content/cache/wp.baz.example.org-wpbaz1-123456' => null,
					'vfs://public/wp-content/cache/example.org#fr'                   => null,
				],
			],
		],
	],
];
