<?php

namespace App\DataTables\FormFilters;

use App\Models\Book;
use App\Models\Cicle;

class BookId extends FormFilter
{
    /**
     *
     * @param $repository
     * @param bool $ajax
     * @return string
     */
    public function book_id($repository, $ajax = false): string
    {
        $method = __FUNCTION__;

        $html   = '<div class="form-group mr-3">' .
            '<label for="' . $method . '" class="mr-2 d-block">Libro</label>';

        if ($ajax) {
            $html .= '<select name="' . $method . '" id="' . $method . '" class="form-control select2" data-placeholder="Seleccione" data-ajax--cache="true">' .
                '<option></option>';
        } else {
            $options    = Book::where('status', 'active')->get();
            $html       .= '<select name="' . $method . '" id="' . $method . '" class="form-control select2" data-placeholder="Seleccione">' .
                '<option></option>';

            if ($options->isNotEmpty()) {
                foreach ($options as $key => $item) {
                    $selected   = (old($method) !== null && (int) old($method) === $item->id) ? ' selected' : '';
                    $html       .= '<option value="' . $item->id . '" ' . $selected . '>' . $item->name . '</option>';
                }
            }
        }

        $html .= '<option value="all">Todos</option>';

        $html .= '</select>' .
            '</div>';

        return $html;
    }
}
