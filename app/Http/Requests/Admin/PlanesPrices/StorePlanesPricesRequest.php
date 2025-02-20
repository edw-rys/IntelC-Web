<?php

namespace App\Http\Requests\Admin\PlanesPrices;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanesPricesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                 => ['required', 'string', 'max:500'],
            'short_description'     => ['required', 'string'],
            'price'                 => ['required', 'numeric'],
            'description'           => ['required', 'string'],
            'image'                 => ['required', 'string'],
        ];
    }
}
