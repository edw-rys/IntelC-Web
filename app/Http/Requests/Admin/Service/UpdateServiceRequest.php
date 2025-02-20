<?php

namespace App\Http\Requests\Admin\Service;

use App\Models\Service;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new Service())],
            'short_description'     => ['required', 'string'],
            'description'           => ['required', 'string'],
            // 'image'                 => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
