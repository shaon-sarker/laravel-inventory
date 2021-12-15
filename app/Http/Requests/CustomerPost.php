<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerPost extends FormRequest
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
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'shopname' => 'required',
            'photo' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'branch_name' => 'required',
            'bank_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'customer_id field is required',
            'name.required' => 'this field is required',
            'phone.required' => 'this field is required',
            'address.required' => 'this field is required',
            'shopname.required' => 'this field is required',
            'photo.required' => 'this field is required',
            'account_holder.required' => 'this field is required',
            'account_number.required' => 'this field is required',
            'branch_name.required' => 'this field is required',
            'bank_name.required' => 'this field is required',
        ];
    }
}
