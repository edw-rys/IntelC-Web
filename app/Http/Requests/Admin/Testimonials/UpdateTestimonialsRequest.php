<?php

namespace App\Http\Requests\Admin\Testimonials;

use App\Models\Testimonials;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialsRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new Testimonials())],
            'person'                => ['required', 'string', 'max:500'],
            'stars'                 => ['required', 'integer', 'max:5', 'min:0'],
            'place'                 => ['required', 'string'],
            'description'           => ['required', 'string'],
        ];
    }
}
