<?php
return [
	'vfs_dir' => 'wp-content/cache/wp-rocket/',

	'structure' => [
		'wp-content' => [
			'cache' => [
				'wp-rocket' => [
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
						'francais.html'   => ''
					],
				],
			],
		],
	],

	'test_data' => [
		'shouldRemoveMainDomainFilesWhenNoLangGiven'   => [
			'i18n'     => [
				'lang' => ''
			],
			'home_url' => 'http://example.org',
			'expected' => [
				'cleaned' => [
					'vfs://public/wp-content/cache/wp-rocket/example.org/index.html_gzip'                => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/index.html'                     => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/index-test.html'                => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/.mobile-active'                 => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/.no-webp'                       => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/page/1/index.html_gzip'         => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/page/1/index.html'              => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/page/2/index.html_gzip'         => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org/page/2/index.html'              => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org-wpmedia-123456/index.html_gzip' => null,
					'vfs://public/wp-content/cache/wp-rocket/example.org-tester-987654/index.html_gzip'  => null,

					'vfs://public/wp-content/cache/wp-rocket/example.org#fr/index.html_gzip' => null,
				],
			]
		],
		'shouldRemoveSubDomainFilesWhenNoLangGiven'    => [
			'i18n'     => [
				'lang' => ''
			],
			'home_url' => 'http://baz.example.org',
			'expected' => [
				'cleaned' => [
					'vfs://public/wp-content/cache/wp-rocket/baz.example.org/index.html_gzip'             => null,
					'vfs://public/wp-content/cache/wp-rocket/baz.example.org-baz1-123456/index.html_gzip' => null,
					'vfs://public/wp-content/cache/wp-rocket/baz.example.org-baz2-987654/index.html_gzip' => null,
					'vfs://public/wp-content/cache/wp-rocket/baz.example.org-baz3-456789/index.html_gzip' => null,
				],
			],
		],
		'shouldRemoveSubSubDomainFilesWhenNoLangGiven' => [
			'i18n'     => [
				'lang' => ''
			],
			'home_url' => 'http://wp.baz.example.org',
			'expected' => [
				'cleaned' => [
					'vfs://public/wp-content/cache/wp-rocket/wp.baz.example.org/index.html_gzip'               => null,
					'vfs://public/wp-content/cache/wp-rocket/wp.baz.example.org-wpbaz1-123456/index.html_gzip' => null,
				],
			],
		],
		'shouldRemoveLangMainDomainFilesWhenLangGiven' => [
			'i18n'     => [
				'lang' => 'fr'
			],
			'home_url' => 'http://example.org',
			'expected' => [
				'cleaned' => [
					'vfs://public/wp-content/cache/wp-rocket/example.org#fr/index.html_gzip' => null,
				],
			],
		],
	],
];
