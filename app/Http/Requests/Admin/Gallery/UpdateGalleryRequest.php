<?php

namespace App\Http\Requests\Admin\Gallery;

use App\Models\Gallery;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new Gallery())],
            'title'                 => ['required'],
            'image'                 => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
