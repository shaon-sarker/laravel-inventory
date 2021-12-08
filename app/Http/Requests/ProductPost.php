<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
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
            'category_id' => 'required',
            'supplier_id' => 'required',
            'product_serialno' => 'required',
            'prodruct_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_grage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'this field is require',
            'supplier_id.required' => 'this field is require',
            'product_serialno.required' => 'this field is require',
            'prodruct_name.required' => 'this field is require',
            'product_price.required' => 'this field is require',
            'product_quantity.required' => 'this field is require',
            'product_grage.required' => 'this field is require',
            'product_route.required' => 'this field is require',
            'buy_date.required' => 'this field is require',
            'expire_date.required' => 'this field is require',
            'buying_price.required' => 'this field is require',
            'selling_price.required' => 'this field is require',

        ];
    }
}
