<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierPost extends FormRequest
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
            'type' => 'required',
            'photo' => 'required',
            'shop' => 'required',
            'account_holder' => 'required',
            'account_number' => 'required',
            'branch_name' => 'required',
            'bank_name' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'this field is required',
            'email.required' => 'this field is required',
            'phone.required' => 'this field is required',
            'address.required' => 'this field is required',
            'type.required' => 'this field is required',
            'photo.required' => 'this field is required',
            'shop.required' => 'this field is required',
            'account_holder.required' => 'this field is required',
            'account_number.required' => 'this field is required',
            'branch_name.required' => 'this field is required',
            'bank_name.required' => 'this field is required',
        ];
    }
}
