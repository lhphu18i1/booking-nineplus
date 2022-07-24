<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:6|max:30',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => ['required', 'digits:10'],
            'position' => 'required',
            'department' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('message.name_required'),
            'name.min' => __('message.name_min'),
            'name.max' => __('message.name_max'),
            'email.required' => __('message.email_required'),
            'email.email' => __('message.email_email'),
            'email.unique' => __('message.email_unique'),
            'password.required' => __('message.password_required'),
            'password.min' => __('message.password_min'),
            'password.max' => __('message.password_max'),
            'gender.required' => __('message.gender_required'),
            'phone.required' => __('message.phone_required'),
            'position.required' => __('message.position_required'),
            'department.required' => __('message.department_required'),
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->addExtension('checkPass', function ($validator) {
    //         if (!empty($this->password)) {
    //             return true;
    //         }
    //     });
    // }
}
