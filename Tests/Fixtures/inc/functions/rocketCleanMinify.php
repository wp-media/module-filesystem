<?php

return [
	'vfs_dir'   => 'wp-content/cache/min/',

	'structure' => [
		'wp-content' => [

			'cache' => [
				// Minify cache.
				'min'          => [
					'1'         => [
						'5c795b0e3a1884eec34a989485f863ff.js'     => '',
						'5c795b0e3a1884eec34a989485f863ff.js.gz'  => '',
						'fa2965d41f1515951de523cecb81f85e.css'    => '',
						'fa2965d41f1515951de523cecb81f85e.css.gz' => '',
						'wp-content'                              => [
							'plugins' => [
								'imagify' => [
									'assets' => [
										'css' => [
											'admin-bar-924d9d45c4af91c09efb7ad055662025.css' => '',
											'admin-bar-bce302f71910a4a126f7df01494bd6e0.css' => '',
										],
										'js'  => [
											'admin-bar-171a2ef75c22c390780fe898f9d40c8d.js' => '',
											'admin-bar-e4aa3c9df56ff024286f4df600f4c643.js' => '',
										],
									]
								],
							],
						],
						'wp-includes'                             => [
							'css' => [
								'admin-bar-85585a650224ba853d308137b9a13487.css' => '',
								'dashicons-c2ba5f948753896932695bf9dad93d5e.css' => '',
							],
							'js'  => [
								'jquery'                                        => [
									'jquery-migrate-ca635e318ab90a01a61933468e5a72de.js' => '',
								],
								'admin-bar-65d8267e813dff6d0059914a4bc252aa.js' => '',
							],
						],
					],
					'2'         => [
						'34a989485f863ff5c795b0e3a1884eec.js'     => '',
						'34a989485f863ff5c795b0e3a1884eec.js.gz'  => '',
						'523cecb81f85efa2965d41f1515951de.css'    => '',
						'523cecb81f85efa2965d41f1515951de.css.gz' => '',
					],
					'3rd-party' => [
						'2n7x3vd41f1515951de523cecb81f85e.css'    => '',
						'2n7x3vd41f1515951de523cecb81f85e.css.gz' => '',
						'bt937b0e3a1884eec34a989485f863ff.js'     => '',
						'bt937b0e3a1884eec34a989485f863ff.js.gz'  => '',
					],
				],
			],

		]
	],

	// Test data.
	'test_data' => [
		'shouldNotCleanWhenNoExtensionsGiven'     => [
			'extensions' => '',
			'expected'   => [
				'cleaned' => [],
			],
		],
		'shouldNotCleanWhenExtensionDoesNotExist' => [
			'extensions' => [ 'php', 'html' ],
			'expected'   => [
				'cleaned' => [],
			],
		],
		'shouldClean_css'                         => [
			'extensions' => 'css',
			'expected'   => [
				'cleaned' => [
					'vfs://public/wp-content/cache/min/1/fa2965d41f1515951de523cecb81f85e.css'    => null,
					'vfs://public/wp-content/cache/min/1/fa2965d41f1515951de523cecb81f85e.css.gz' => null,
					'vfs://public/wp-content/cache/min/1/wp-content/css/'                         => null,
					'vfs://public/wp-content/cache/min/1/wp-includes/plugins/imagify/assets/css/' => null,

					'vfs://public/wp-content/cache/min/3rd-party/2n7x3vd41f1515951de523cecb81f85e.css'    => null,
					'vfs://public/wp-content/cache/min/3rd-party/2n7x3vd41f1515951de523cecb81f85e.css.gz' => null,
				],
			],
		],
		'shouldClean_css.gz'                      => [
			'extensions' => 'css.gz',
			'expected'   => [
				'cleaned' => [
					'vfs://public/wp-content/cache/min/1/fa2965d41f1515951de523cecb81f85e.css.gz' => null,

					'vfs://public/wp-content/cache/min/3rd-party/2n7x3vd41f1515951de523cecb81f85e.css.gz' => null,
				],
			],
		],
		'shouldClean_js'                          => [
			'extensions' => 'js',
			'expected'   => [
				'cleaned'      => [
					'vfs://public/wp-content/cache/min/1/5c795b0e3a1884eec34a989485f863ff.js'    => null,
					'vfs://public/wp-content/cache/min/1/5c795b0e3a1884eec34a989485f863ff.js.gz' => null,
					'vfs://public/wp-content/cache/min/1/wp-content/plugins/imagify/assets/js/'  => null,
					'vfs://public/wp-content/cache/min/1/wp-includes/js/'                        => [],

					'vfs://public/wp-content/cache/min/3rd-party/bt937b0e3a1884eec34a989485f863ff.js'    => null,
					'vfs://public/wp-content/cache/min/3rd-party/bt937b0e3a1884eec34a989485f863ff.js.gz' => null,
				],
			],
		],
		'shouldClean_js.gz'                       => [
			'extensions' => 'js.gz',
			'expected'   => [
				'cleaned' => [
					'vfs://public/wp-content/cache/min/1/5c795b0e3a1884eec34a989485f863ff.js.gz' => null,

					'vfs://public/wp-content/cache/min/3rd-party/bt937b0e3a1884eec34a989485f863ff.js.gz' => null,
				],
			],
		],
		'shouldCleanCssAndJs'                     => [
			'extensions' => [ 'css', 'js' ],
			'expected'   => [
				'cleaned' => [
					'vfs://public/wp-content/cache/min/1/5c795b0e3a1884eec34a989485f863ff.js'     => null,
					'vfs://public/wp-content/cache/min/1/5c795b0e3a1884eec34a989485f863ff.js.gz'  => null,
					'vfs://public/wp-content/cache/min/1/fa2965d41f1515951de523cecb81f85e.css'    => null,
					'vfs://public/wp-content/cache/min/1/fa2965d41f1515951de523cecb81f85e.css.gz' => null,
					'vfs://public/wp-content/cache/min/1/wp-content/plugins/imagify/assets/css/'  => null,
					'vfs://public/wp-content/cache/min/1/wp-content/plugins/imagify/assets/js/'   => null,
					'vfs://public/wp-content/cache/min/1/wp-includes/css/'                        => null,
					'vfs://public/wp-content/cache/min/1/wp-includes/js/'                         => [],

					'vfs://public/wp-content/cache/min/3rd-party/' => [],
				],
			],
		],
		'shouldClean_.gz'                         => [
			'extensions' => 'gz',
			'expected'   => [
				'cleaned' => [
					'vfs://public/wp-content/cache/min/1/fa2965d41f1515951de523cecb81f85e.css.gz'         => null,
					'vfs://public/wp-content/cache/min/1/5c795b0e3a1884eec34a989485f863ff.js.gz'          => null,
					'vfs://public/wp-content/cache/min/3rd-party/2n7x3vd41f1515951de523cecb81f85e.css.gz' => null,
					'vfs://public/wp-content/cache/min/3rd-party/bt937b0e3a1884eec34a989485f863ff.js.gz'  => null,
				],
			],
		],
	],
];
