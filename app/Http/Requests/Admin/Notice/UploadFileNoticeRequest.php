<?php

namespace App\Http\Requests\Admin\Notice;

use App\Models\Notice;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class UploadFileNoticeRequest extends FormRequest
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
            'file'          => ['required', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'],
            'description'   => ['required', 'string'],
            'notice_id'    => ['required', new Exist(new Notice())]
        ];
    }
}
