<?php

namespace App\DataTables\FormFilters;

class Status extends FormFilter
{
    /**
     * Is Admin?
     *
     * @param $repository
     * @return string
     */
    public function status($repository): string
    {
        $method = __FUNCTION__;

        $options = $repository->statuses();

        $html = '<div class="form-group mr-3">' .
            '<label for="' . $method . '" class="mr-2 d-block">Estado</label>' .
            '<select name="' . $method . '" id="' . $method . '" class="form-control select2" data-placeholder="Seleccione" style="width:100%">' .
            '<option></option>';

        foreach ($options as $key => $status) {
            $selected = (old($method) !== null && (int) old($method) === $key) ? ' selected' : '';
            $statusValue = $status->status ?? $status->active;

            // Status not exist
            if (! array_key_exists($statusValue, allStatuses())) {
                $statusValue = '-';
            }

            $html .= '<option value="' . $statusValue . '" ' . $selected . '>' . allStatuses()[$statusValue] . '</option>';
        }

        $html .= '</select>' .
            '</div>';

        return $html;
    }
}
