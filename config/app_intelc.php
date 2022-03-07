<?php

return [

	'front_menus'	=> [
		(object) [
			'title' => 'Inicio',
			'has_permissions' => false,
			'permissions' => '',
			'route' => 'front.view.static',
			'params'        => [
				'page'      => 'home'
			],
		],
		(object) [
			'title'			=> 'Municipio',
			'id'			=> 'municipio_menu',
			'icon'			=> 'fas fa-book',
			'has_permissions' 	=> true,
			'permissions' 	=> false,
			'route'			=> false,
			'submenus' => [
				(object) [
					'title' => 'Directivos',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.static',
					'params'        => [
						'page'      => 'directivos'
					],
				],
				(object) [
					'title' => 'Direcciones',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.directions',
					'params'        => [
					],
				],
				(object) [
					'title' => 'Servicios Municipales',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.services',
					'params'        => [
						'page'      => 'serviciosmunicipales'
					],
				],
				
				(object) [
					'title' => 'Obras Públicas',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.obras',
					'params'        => [
					],
				]
			]
		],
		(object) [
			'title'			=> 'Ciudad Palora',
			'id'			=> 'city_p_menu',
			'icon'			=> 'fas fa-layer-group',
			'has_permissions' 	=> false,
			'permissions' 	=> false,
			'route'			=> false,
			'submenus' => [
				(object) [
					'title' => 'Nosotros',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.static',
					'params'        => [
						'page'      => 'nosotros'
					],
				],
				(object) [
					'title' => 'Danza y Cultura',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.static',
					'params'        => [
						'page'      => 'cultura'
					],
				],
				(object) [
					'title' => 'Desarrollo Económico',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.static',
					'params'        => [
						'page'      => 'industria'
					],
				]
			]
		],

		(object) [
			'title'			=> 'Turismo',
			'id'			=> 'turismo_menu',
			'icon'			=> 'fas fa-layer-group',
			'has_permissions' 	=> false,
			'permissions' 	=> false,
			'route'			=> false,
			'submenus' => [
				(object) [
					'title' => 'Atractivos turísticos',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.static',
					'params'        => [
						'page'	=> 'turismo'
					],
				],
				(object) [
					'title' => 'Alojamiento y Restaurantes',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.accommodations',
					'params'        => [
					],
				],
				(object) [
					'title' => 'Galería multimedia',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.static',
					'params'        => [
						'page'      => 'galeria'
					],
				]
			]
		],

		(object) [
			'title'			=> 'Unidad Técnica <br>de la Pitahaya',
			'id'			=> 'notice_menu',
			'icon'			=> 'fas fa-key',
			'has_permissions' 	=> false,
			'permissions' 	=> false,
			'route'			=> 'front.view.static',
			'params'        => [
				'page'		=> 'unidad-tecnica'
            ],
		],


		(object) [
			'title'			=> 'Transparencia',
			'id'			=> 'transparencia_menu',
			'icon'			=> 'fas fa-layer-group',
			'has_permissions' 	=> false,
			'permissions' 	=> false,
			'route'			=> false,
			'submenus' => [
				(object) [
					'title' => 'Ley Orgánica',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.files',
					'params'        => [
						'type'		=> 'ley_transparencia'
					],
				],
				(object) [
					'title' => 'Ordenanzas',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.files',
					'params'        => [
						'type'		=> 'ordenanzas'
					],
				],
				(object) [
					'title' => 'Resoluciones',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.files',
					'params'        => [
						'type'		=> 'resolutions'
					],
				],
				(object) [
					'title' => 'Rendición de cuentas',
					'has_permissions' => false,
					'permissions' => false,
					'route' => 'front.view.files',
					'params'        => [
						'type'		=> 'account_rendition'
					],
				],
				(object) [
					// Puntos turísticos, ITUR,
					'title' => 'Lotaip',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.files',
					'params'        => [
						'type'		=> 'lotaip'
					],
				],
			]
		],

		(object) [
			'title'			=> 'Noticias',
			'id'			=> 'notice_menu',
			'icon'			=> 'fas fa-key',
			'has_permissions' 	=> false,
			'permissions' 	=> false,
			'route'			=> 'front.notices',
			'params'        => [
            ],
		],
		

		(object) [
			'title'			=> 'Agenda',
			'id'			=> 'events_menu',
			'icon'			=> 'fas fa-layer-group',
			'has_permissions' 	=> false,
			'permissions' 	=> false,
			'route'			=> false,
			'submenus' => [
				(object) [
					'title' => 'Ciudad Palora',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.events',
					'params'        => [
						'type'		=> 'palora'
					],
				],
				(object) [
					'title' => 'Alcaldía',
					'has_permissions' => false,
					'permissions' => '',
					'route' => 'front.view.events',
					'params'        => [
						'type'		=> 'alcaldia'
					],
				],
				(object) [
					'title'			=> 'Contácto',
					'icon'			=> 'fas fa-key',
					'has_permissions' 	=> false,
					'permissions' 	=> false,
					'route' => 'front.view.static',
							'params'        => [
								'page'      => 'contacto'
							],
				],
			]
		],
		
	],
	'setting' 	=> [
		'date_format'	=> 'd-m-Y',
		'date_format_show'	=> 'd/m/Y',
		'date_picker'	=> 'dd-mm-yyyy'
	],
	'views_title'	=> [
		'dashboard' => 'Dashboard',
	],
	/**
	 * FTP ROUTES
	 */
	'routes'		=> [
		'dir'			=> 'root/Liranka/LMS/proyecto/public_html/efren2.0back',
		'images_logo'	=> '/assets/images/logo',
		// 'images_logo_gucho'		=> 'assets/images/logo',
	],
	'email'				=> [
		'active_user'	=> [
			'subject'		=> 'Activación de usuario (Liranka)'
		]
	],
	/**
	 * Cicles
	 */	
	'cicles'	=> [
		'I' , 'EGB', 'BGU'
	],
	'types_qualification'	=> [
		(object)[
			'value'	=> 'BGU',
			'title'	=> 'EX, MB, B, R'
		],
		(object)[
			'value'	=> 'C',
			'title'	=> 'A, B, C, D, E'
		],
		(object)[
			'value'	=> 'I',
			'title'	=> 'A, EP, I'
		]
	],
];
