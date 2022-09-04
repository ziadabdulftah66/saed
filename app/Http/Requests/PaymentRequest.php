<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'invoice_number'=>'required|exists:invoices,invoice_number',
            'payment_date'=>'required',
            'payment_number'=>'required|unique:payments,payment_number,'.$this -> id,
            'payment_price'=>'required|min:0|numeric'
        ];
    }
}
