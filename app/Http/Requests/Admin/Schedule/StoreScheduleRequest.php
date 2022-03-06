<?php

namespace App\Http\Requests\Admin\Schedule;

use App\Models\ScheduleType;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'start_date'            => ['required', 'date'],
            'end_date'              => ['required', 'date'],
            'email'                 => ['required', 'string'],
            'location'              => ['nullable', 'string'],
            'number_seats'          => ['nullable', 'integer'],
            'available_seats'       => ['nullable', 'integer'],
            'phone'                 => ['nullable', 'string'],
            'schedule_type_id'      => ['required', new Exist(new ScheduleType())],
        ];
    }
}
