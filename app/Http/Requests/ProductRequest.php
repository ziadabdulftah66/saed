<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_number' => 'required|unique:products,product_number,'.$this -> id,
            'product_name' => 'required|unique:products,product_name,'.$this -> id,
            'category_id' => 'required|exists:categories,id',
            'section_id' => 'required|exists:sections,id',
            'brand_id' => 'required|exists:brands,id',
            'Cost_price' => 'required|numeric',
            'selling_price' => 'required|numeric',

        ];
    }
}
