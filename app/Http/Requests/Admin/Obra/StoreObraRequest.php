<?php

namespace App\Http\Requests\Admin\Obra;

use Illuminate\Foundation\Http\FormRequest;

class StoreObraRequest extends FormRequest
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
            'location'              => ['required', 'string'],
            'project'               => ['required', 'string'],
            'work_amount'           => ['required', 'string'],
            'audit_amount'          => ['required', 'string'],
            'description'           => ['required', 'string'],
            'percentage'            => ['required', 'numeric', 'min:0', 'max:100'],
            'image'                 => ['required', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
