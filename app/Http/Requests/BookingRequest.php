<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'title' => 'required',
            'date' => 'required|date_format:Y-m-d|after_or_equal:1920-01-01',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
            'amount_of_people' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => __('message.title_required'),
            'date.required' => __('message.date_required'),
            'time_start.required' => __('message.time_start_required'),
            'time_end.required' => __('message.time_end_required'),
            'amount_of_people.required' => __('message.amount_of_people_required'),
            'amount_of_people.integer' => __('message.amount_of_people_integer')
        ];
    }
}
