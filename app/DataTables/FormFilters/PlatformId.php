<?php

namespace App\DataTables\FormFilters;

use App\Models\Platform as ModelsPlatform;

class PlatformId extends FormFilter
{
    /**
     *
     * @param $repository
     * @param bool $ajax
     * @return string
     */
    public function platform_id($repository, $ajax = false): string
    {
        $method = __FUNCTION__;

        $html   = '<div class="form-group mr-3">' .
            '<label for="' . $method . '" class="mr-2 d-block">Plataforma</label>';

        if ($ajax) {
            $html .= '<select name="' . $method . '" id="' . $method . '" class="form-control select2" data-placeholder="Seleccione" data-ajax--cache="true"  onchange="changeInstitutionsFilter(this.value)">' .
                '<option></option>';
        } else {
            $options    = ModelsPlatform::where('status', 'active')->get();
            $html       .= '<select name="' . $method . '" id="' . $method . '" class="form-control select2" data-placeholder="Seleccione"  onchange="changeInstitutionsFilter(this.value)" style="width: 100%">' .
                '<option></option>';
            $html .= '<option value="all">Todos</option>';
            if ($options->isNotEmpty()) {
                foreach ($options as $key => $item) {
                    $selected   = (old($method) !== null && (int) old($method) === $item->id) ? ' selected' : '';
                    $html       .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->name . '</option>';
                }
            }
        }

        

        $html .= '</select>' .
            '</div>';

        return $html;
    }
}
