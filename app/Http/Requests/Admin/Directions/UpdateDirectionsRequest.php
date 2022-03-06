<?php

namespace App\Http\Requests\Admin\Directions;

use App\Models\Directions;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDirectionsRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new Directions())],
            'short_description'     => ['required', 'string'],
            'description'           => ['required', 'string'],
            // 'image'                 => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
