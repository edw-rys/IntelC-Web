<?php

namespace App\Http\Requests\Admin\Files;

use App\Models\Files;
use App\Models\GroupFile;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
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
            // 'file'          => ['required',  'file', 'max:10024'],
            'file'          => ['required',  'file'],
            'description'   => ['required', 'string'],
            'group_id'    => ['required', new Exist(new GroupFile())]
        ];
    }
}
