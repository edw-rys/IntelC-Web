<?php

use App\Models\TypesFiles;

if (! function_exists('menu_files')) {
    /**
     * Create New Items Menu
     *
     * @return Array
     */
    function menu_files($maxLength = null)
    {
        $files_db = TypesFiles::where('status', 'active')->get();
        // dd($files_db);
        return $files_db->map(function($item){
            return (object)[
                'title'             => $item->title,
                'id'                => $item->system_name,
                'icon'              => $item->icon,
                'has_permissions'   => true,
                'permissions' 	    => 'access_'.$item->system_name,
                'route'             => 'admin.files.index',
                'params'            => [
                    'type'          => $item->system_name
                ]
            ];
        })->toArray();
    }
}


if (! function_exists('menu_files_group')) {
    /**
     * Create New Items Menu
     * @param @type_code
     */
    function menu_files_group($type_code)
    {
        $files_db = TypesFiles::where('status', 'active')
            ->With('groups')
            ->where('system_name', $type_code)
            ->first();
        if ($files_db == null) {
            return [];
        } 

        return $files_db->groups;
    }
}

if (! function_exists('menu_admin')) {
    /**
     * Create New Items Menu
     *
     * @return Array
     */
    function menu_admin()
    {
        return [
            (object) [
                'header'	=> 'Administración',
                'menus'	=> [
                    (object) [
                        'title'			=> 'Planes y precios',
                        'id'			=> 'princes_plan',
                        'icon'			=> 'fas fa-money-bill',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'prices_plans',
                        'route'			=> 'admin.planes-prices.index'
                    ],
                    (object) [
                        'title'			=> 'Servicios',
                        'id'			=> 'service',
                        'icon'			=> 'fab fa-servicestack',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_service',
                        'route'			=> 'admin.service.index'
                    ],
                    (object) [
                        'title'			=> 'Testimonios',
                        'id'			=> 'testimonials',
                        'icon'			=> 'fas fa-user',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_testimonials',
                        'route'			=> 'admin.testimonials.index'
                    ],
                    
                    (object) [
                        'title'			=> 'Nuestro Equipo',
                        'id'			=> 'our-team',
                        'icon'			=> 'fas fa-user',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_our_team',
                        'route'			=> 'admin.our-team.index'
                    ],

                    (object) [
                        'title'			=> 'Preguntas comunes',
                        'id'			=> 'questions',
                        'icon'			=> 'fas fa-question',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_questions',
                        'route'			=> 'admin.questions.index'
                    ],
                    
                    (object) [
                        'title'			=> 'Blog/Imágenes',
                        'id'			=> 'blog',
                        'icon'			=> 'far fa-newspaper',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_blog',
                        'route'			=> 'admin.blog.index'
                    ],
                ],
            ],
            (object) [
                'header'	=> 'Archivos',
                'menus'	=> menu_files(),
            ],
        ];
    }
}