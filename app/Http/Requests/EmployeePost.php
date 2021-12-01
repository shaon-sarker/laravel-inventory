<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeePost extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'slaray' => 'required',
            'city' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'this field is required',
            'email.required' => 'this field is required',
            'phone.required' => 'this field is required',
            'address.required' => 'this field is required',
            'experience.required' => 'this field is required',
            'photo.required' => 'this field is required',
            'slaray.required' => 'this field is required',
            'city.required' => 'this field is required',
        ];
    }
}
