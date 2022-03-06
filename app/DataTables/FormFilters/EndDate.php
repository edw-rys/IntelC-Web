<?php

namespace App\DataTables\FormFilters;

class EndDate
{
    /**
     * Is Admin?
     *
     * @return string
     */
    public function end_date(): string
    {
        $method         = __FUNCTION__;
        $datetimepicker = 'datetimepicker-' . $method;
        $target         = '.' . $datetimepicker;

        return '<div class="form-group mr-3">' .
            '<label for="' . $method . '" class="mr-2 d-block">Fecha de fin</label>' .
            '<div class="input-group date" data-target-input="nearest">' .
                '<input type="text" id="' . $method . '" class="form-control datetimepicker ' . $datetimepicker . '" value="' . old($method)  . '" data-target="' . $target . '" data-format="YYYY-MM-DD">' .
                '<div class="input-group-append" data-target="' . $target . '" data-toggle="datetimepicker">' .
                    '<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>' .
                '</div>' .
            '</div>' .
        '</div>';
    }
}
