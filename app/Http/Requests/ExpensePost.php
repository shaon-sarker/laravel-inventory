<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpensePost extends FormRequest
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
            'details' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'details.required' => 'this field is required',
            'amount.required' => 'this field is required',
            'month.required' => 'this field is required',
            'date.required' => 'this field is required',
        ];
    }
}
