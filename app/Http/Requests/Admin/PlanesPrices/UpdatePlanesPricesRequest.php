<?php

namespace App\Http\Requests\Admin\PlanesPrices;

use App\Models\PlanesPrices;
use App\Models\Service;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanesPricesRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new PlanesPrices())],
            'short_description'     => ['required', 'string'],
            'description'           => ['required', 'string'],
            'title'                 => ['required', 'string', 'max:500'],
            'short_description'     => ['required', 'string'],
            'price'                 => ['required', 'numeric'],
            'description'           => ['required', 'string'],
            'image'                 => ['required', 'string'],
            // 'image'                 => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
