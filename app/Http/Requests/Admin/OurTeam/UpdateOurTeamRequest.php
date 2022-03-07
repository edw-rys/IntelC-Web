<?php

namespace App\Http\Requests\Admin\OurTeam;

use App\Models\Team;
use App\Models\Testimonials;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOurTeamRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new Team())],
            'name'                  => ['required', 'string', 'max:500'],
            'cargo'                 => ['required', 'string'],
            'image'                 => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
        ];
    }
}
