<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'description'           => ['required', 'string'],
            'image'                 => ['required', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
