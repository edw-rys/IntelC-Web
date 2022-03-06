<?php

use Illuminate\Contracts\Translation\Translator;

if (! function_exists('dropdown_action_token')) {
    function dropdown_action_token($id, $status, $action, $route, $protected = 0)
    {
        $dropdown = '<a href="#" class="btn btn-sm btn-secondary btn-rounded dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' .
            trans('global.actions') . ' <i class="ik ik-chevron-down mr-0"></i></a>' .
            '<div class="dropdown-menu">';
        // $dropdown .= show_action($route . '.show', $id);
        if ($status === 'active') {
            $dropdown .= block_action($route . '.block', $id);
        } elseif ($status === 'blocked') {
            $dropdown .= unlock_action($route . '.unblock', $id);
        }

        $dropdown .= '</div>';

        return $dropdown;
    }
}

if (! function_exists('dropdown_action')) {
    /**
     * Build Dropdown Menu for Actions
     *
     * @param $id
     * @param $status
     * @param $action
     * @param $route
     * @param int $protected
     * @return string
     */
    function dropdown_action($id, $status, $action, $route, $protected = 0)
    {
        if ($status === null || $status === '') {
            return '';
        }
        if(strtoupper($status) == 'A'){
            $status = 'active';
        }
        if(strtoupper($status) == 'I'){
            $status = 'inactive';
        }
        if(strtoupper($status) == 'D'){
            $status = 'deleted';
        }
        
        // return $status;
        $dropdown = '<a href="#" class="btn btn-secondary btn-rounded dropdown-toggle btn-sm" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acciones <i class="ik ik-chevron-down mr-0"></i></a>' .
        '<div class="dropdown-menu">';
        
        $auth_id    = auth()->user()->id;

        if (have_permission('disable_'.$action,  auth()->user()->id) && $status == 'enabled') {
            $dropdown .= show_action($route . '.disable', $id, 'Deshabilitar');
        }

        if (have_permission('show_'.$action,  auth()->user()->id)) {
            $dropdown .= show_action($route . '.show', $id, '', "far fa-eye");
        }
        
        if (have_permission('enable_'.$action,  auth()->user()->id)  && $status == 'disabled') {
            $dropdown .= show_action($route . '.enable', $id, 'Habilitar');
        }

        // IS STATUS...?

        // Active & Created
        if ($status === 'active' || $status === 'created' || $status === 'unprocessed') {
            if (route_exists($route. '.participants')) {
                $dropdown .= show_action($route . '.participants', $id, 'Participantes', 'fas fa-users');
            }
            if (have_permission('edit_'.$action,  auth()->user()->id)) {
                $dropdown .= edit_action($route . '.edit', $id);
            }
            // dd(have_permission('inactive_'.$action,  auth()->user()->id), 'inactive_'.$action);
            if (have_permission('inactive_'.$action,  auth()->user()->id)) {
                $dropdown .= inactive_action($route . '.inactive', $id, $action);
            }
            if (have_permission('close_'.$action,  auth()->user()->id)) {
                $dropdown .= inactive_action($route . '.close', $id, $action, 'Cerrar', 'd-inline', ' btn btn-warning');
            }

            if($route == 'admin.admin'){
                // dd($id, $protected );
                if ($id != $auth_id && !$protected && have_permission('delete_'.$action,  auth()->user()->id)) {
                    $dropdown .= delete_action($route . '.destroy', $id, $action);
                }
            }else{

                if (!$protected && have_permission('delete_'.$action,  auth()->user()->id)) {
                    $dropdown .= delete_action($route . '.destroy', $id, $action);
                }
            }
            if (have_permission('shared_'.$action,  auth()->user()->id)) {
                $dropdown .= show_action($route . '.shared', $id, 'Compartir', "fas fa-share-alt");
            }
            if (have_permission('delete_'.$action,  auth()->user()->id)) {
                $dropdown .= delete_action($route . '.delete', $id, $action);
            }
            if ($status === 'created') {
                $dropdown .= enable_action_bd($route . '.enable', $id, $action);
            }
        }
        // Inactive
        elseif ($status === 'inactive') {
            if (have_permission('active_'.$action,  auth()->user()->id)) {
                $dropdown .= restore_action($route . '.active', $id, $action);
            }

            if (have_permission('delete_'.$action,  auth()->user()->id)) {
                $dropdown .= delete_action($route . '.destroy', $id, $action);
            }
        }
        // Deleted
        elseif ($status === 'deleted') {
            if (have_permission('restore_'.$action,  auth()->user()->id)) {
                $dropdown .= restore_action($route . '.restore', $id,  $action);
            }
        }
        if ($status === 'pending') {
            if (have_permission('active_'.$action,  auth()->user()->id)) {
                $dropdown .= restore_action($route . '.restore', $id,  $action, 'Habilitar');
            }
        }
        if ($status === 'active' && $action == 'period') {
            if (have_permission('finalize_'.$action,  auth()->user()->id)) {
                $dropdown .= restore_action($route . '.finalize', $id,  $action, 'Finalizar');
            }
        }

        $dropdown .= '</div>';
        return $dropdown;
    }
}

if (! function_exists('insert_action')) {
    /**
     * Create show action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function insert_action(string $route, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Insertar';
        }

        return '<a href="' . route($route) . '" class="dropdown-item"><i class="ik ik-plus mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('show_action')) {
    /**
     * Create show action
     *
     * @param string $route
     * @param int $id
     * @param string|array|Translator $name
     * @return string
     */
    function show_action(string $route, int $id, string $name = '', string $icon = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Mostrar';
        }
        return '<a href="#!"  onclick="$.ajaxModal(\'#modal-component\',\''.route($route,$id).'\')   " class="dropdown-item btn-sm"><i class="'.$icon.'"></i> ' . $name . '</a>';

        // return '<a href="' . route($route, $id) . '" class="dropdown-item" data-show="true"><i class="ik ik-eye mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('edit_action')) {
    /**
     * Create edit action
     *
     * @param string $route
     * @param int $id
     * @param string|array|Translator $name
     * @return string
     */
    function edit_action(string $route, int $id, string $name = '', string $class__=''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Editar';
        }

        return '<a href="#!"  onclick="$.ajaxModal(\'#modal-component\',\''.route($route,$id).'\')   " class="dropdown-item btn-sm '.$class__.'"><i class="far fa-edit"></i> ' . $name . '</a>';
    }
}

if (! function_exists('delete_action')) {
    /**
     * Create delete action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function delete_action(string $route, $id, string $datatable_id, string $name = '',string $block = 'd-inline'): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Eliminar';
        }

        return '<form action="' . route($route, $id) . '" method="POST" id="form-delete-'.$id.'" data-delete="true" class="' . $block . '" onsubmit="deleteData(event, \''.route($route, $id).'\', \''.$datatable_id.'\', \''.$id.'\')">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_method" value="delete">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('enable_action_bd')) {
    /**
     * Create delete action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function enable_action_bd(string $route, $id, string $action = '', string $block = 'd-inline'): string
    {
        if (! route_exists($route)) {
            return '';
        }

        $name = 'Habilitar';
        return '<form action="' . route($route, $id) . '" method="POST" id="form-enable-'.$id.'" data-delete="true" class="' . $block . '" onsubmit="enableInstitution(event, \''.route($route, $id).'\', \''.$action.'\', '.$id.')">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_method" value="POST">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item btn-sm"><i class="ik ik-trash-2 mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('block_action')) {
    /**
     * Create Block action
     *
     * @param string $route
     * @param $id
     * @param string $name
     * @param string $block
     * @return string
     */
    function block_action(string $route, $id, string $name = '', string $block = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Bloquear';
        }

        return '<form action="' . route($route) . '" method="POST" data-block="true" class="' . $block . '">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<button type="submit" class="dropdown-item btn-sm"><i class="ik ik-lock mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('unlock_action')) {
    /**
     * Create unlock action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function unlock_action(string $route, $id, string $name = '', string $block = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Desbloquear';
        }

        return '<form action="' . route($route) . '" method="POST" data-unblock="true" class="' . $block . '">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<button type="submit" class="dropdown-item"><i class="ik ik-unlock mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('restore_action')) {
    /**
     * Create restore action
     *
     * @param string $route
     * @param $id
     * @param string|array|Translator $name
     * @param string $block
     * @return string
     */
    function restore_action(string $route, $id, $datatable_id,string $name = '', string $block = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Restaurar';
        }

        return '<form action="' . route($route, $id) . '" id="form-restore-'.$id.'" method="POST" data-restore="true" class="' . $block . '" onsubmit="restoreData(event, \''.route($route, $id).'\', \''.$datatable_id.'\', '.$id.')">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item btn-sm"><i class="ik ik-rotate-ccw mr-2"></i> ' . $name . '</button>' .
        '</form>';
    }
}

if (! function_exists('approve_action')) {
    /**
     * Create approve action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function approve_action(string $route, string $name = ''): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Aprobar';
        }

        return '<a href="' . route($route) . '" class="dropdown-item"><i class="ik ik-check-circle mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('active_action')) {
    /**
     * Create inactive action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function active_action(string $route, $id,string $name = 'Activar'): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Activar';
        }

        return '<a href="' . route($route, $id) . '" class="dropdown-item"><i class="ik ik-check-circle mr-2"></i> ' . $name . '</a>';
    }
}

if (! function_exists('inactive_action')) {
    /**
     * Create inactive action
     *
     * @param string $route
     * @param string|array|Translator $name
     * @return string
     */
    function inactive_action(string $route, $id, string $datatable_id, string $name = '',string $block = 'd-inline', $other_class = ''): string
    // function inactive_action(string $route, $id,string $name = 'Inactivar'): string
    {
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Inactivar';
        }

        return '<form action="' . route($route, $id) . '" method="POST" id="form-inactive-'.$id.'" data-delete="true" class="' . $block . '" onsubmit="inactiveData(event, \''.route($route, $id).'\', \''.$datatable_id.'\', '.$id.')">' .
            '<input type="hidden" name="id" value="' . $id . '">' .
            '<input type="hidden" name="_method" value="delete">' .
            '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
            '<div class="dropdown-divider"></div>' .
            '<button type="submit" class="dropdown-item'.$other_class.'"><i class="fas fa-lock"></i> ' . $name . '</button>' .
        '</form>';
        if (! route_exists($route)) {
            return '';
        }

        if ($name === '') {
            $name = 'Inactivar';
        }

        return '<a href="' . route($route,$id) . '" class="dropdown-item"><i class="ik ik-check-circle mr-2"></i> ' . $name . '</a>';
    }
    
    if(! function_exists('resolver')){
        function resolver($id, $status, $action, $route){
            //return '<a href="'. route($route.'.gets', $id) .'" ><i class="ik ik-check-circle mr-2"></i>  Algo</a>';
            return '<a href="#!"  onclick="$.ajaxModal(\'#modal-component\',\''.route($route.'.mostrar',$id).'\')   " class=" "><i class="ik ik-edit mr-2"></i> Resolver </a>'; 
        }
    }
}