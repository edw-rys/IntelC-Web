<?php

namespace App\Http\Requests\Admin\Schedule;

use App\Models\Schedule;
use App\Models\ScheduleType;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class StoreParticipantScheduleRequest extends FormRequest
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
            'cargo'                 => ['required', 'string', 'max:500'],
            'schedule_id'           => ['required', new Exist(new Schedule())],
        ];
    }
}
