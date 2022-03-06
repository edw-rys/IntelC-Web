<?php

namespace App\Http\Requests\Admin\Accommodation;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccommodationRequest extends FormRequest
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
            'title'     => ['required', 'string', 'max:500'],
            'address'   => ['nullable', 'string', 'max:500'],
            'email'     => ['nullable', 'email', 'max:500'],
            'phone'     => ['nullable', 'string', 'max:500'],
            'description'     => ['nullable', 'string'],
            'image'     => ['required', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
