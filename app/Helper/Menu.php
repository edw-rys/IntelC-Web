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
                        'title'			=> 'Alojamiento',
                        'id'			=> 'alojamiento',
                        'icon'			=> 'fas fa-home',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_accommodation',
                        'route'			=> 'admin.accommodation.index'
                    ],
                    (object) [
                        'title'			=> 'Servicio',
                        'id'			=> 'service',
                        'icon'			=> 'fas fa-concierge-bell',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_service',
                        'route'			=> 'admin.service.index'
                    ],
                    (object) [
                        'title'			=> 'Direcciones',
                        'id'			=> 'directions',
                        'icon'			=> 'fas fa-concierge-bell',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_directions',
                        'route'			=> 'admin.directions.index'
                    ],
                    (object) [
                        'title'			=> 'Obras',
                        'id'			=> 'obra',
                        'icon'			=> 'fas fa-briefcase',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_obra',
                        'route'			=> 'admin.obra.index'
                    ],
                    // (object) [
                    //     'title'			=> 'Gallery',
                    //     'id'			=> 'gallery',
                    //     'icon'			=> 'fas fa-images',
                    //     'has_permissions' 	=> true,
                    //     'permissions' 	=> 'access_gallery',
                    //     'route'			=> 'admin.gallery.index'
                    // ],
                    (object) [
                        'title'			=> 'Noticias',
                        'id'			=> 'gallery',
                        'icon'			=> 'far fa-newspaper',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_notice',
                        'route'			=> 'admin.notice.index'
                    ],
                    (object) [
                        'title'			=> 'Eventos',
                        'id'			=> 'schedule',
                        'icon'			=> 'fas fa-calendar-alt',
                        'has_permissions' 	=> true,
                        'permissions' 	=> 'access_schedule',
                        'route'			=> 'admin.schedule.index'
                    ],
                ],
                
            ],
            (object) [
                'header'	=> 'Administración',
                'menus'	=> menu_files(),
                
            ],
        ];
    }
}