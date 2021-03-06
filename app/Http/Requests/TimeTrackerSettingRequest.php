<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class TimeTrackerSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'morning_break_time' => ['numeric', 'nullable'],
            'lunch_break_time' => ['numeric', 'nullable'],
            'afternoon_break_time' => ['numeric', 'nullable'],
            'bio_break_time' => ['numeric', 'nullable'],
            'dinner_break_time' => ['numeric', 'nullable'],
            'night_break_time' => ['numeric', 'nullable'],
            'dawn_break_time' => ['numeric', 'nullable']
        ];
    }
}
