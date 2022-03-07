<?php

namespace App\Http\Requests\Admin\Question;

use App\Models\Questions;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'id'                    => ['required', new Exist(new Questions())],
            'question'  => ['required', 'string'],
            'answer'    => ['required', 'string'],
        ];
    }
}
