<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ValidateFormBooking
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'amount_of_people' => 'required|numeric|integer',
            'time_start' => 'required',
            'time_end' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập nội dung',
            'date.required' => 'Vui lòng chọn ngày',
            'amount_of_people.required' => 'Vui lòng nhập số người tham gia',
            'amount_of_people.numeric' => 'Vui lòng nhập phải là số',
            'amount_of_people.integer' => 'Vui lòng nhập số nguyên',
            'time_start.required' => 'Vui lòng chọn thời gian bắt đầu',
            'time_end.required' => 'Vui lòng chọn thời gian kết thúc',
        ]);
        return $validator->validate();
    }
}