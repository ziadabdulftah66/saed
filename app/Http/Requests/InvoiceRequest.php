<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'user_id'=>'required|exists:users,id',

            'invoice_date'=> 'required',
            'discount_type'=>'required',
            'discount_value'=>'required',
            'shipping'=>'required',
            'invoice_number'=>'required|unique:invoices,invoice_number,'.$this -> id,
            'total_due'=>'required',
            'product_number' => 'required',
            'product_name' => 'required',
            'quantity'=>'required',
            'unit_price'=>'required',
            'row_sub_total'=>'required',


        ];
    }
}
