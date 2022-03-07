<?php

namespace App\Http\Requests\Admin\OurTeam;

use Illuminate\Foundation\Http\FormRequest;

class StoreOurTeamRequest extends FormRequest
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
            'name'                  => ['required', 'string', 'max:500'],
            'cargo'                 => ['required', 'string'],
            'image'                 => ['required', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
