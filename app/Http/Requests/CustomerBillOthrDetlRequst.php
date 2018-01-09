<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerBillOthrDetlRequst extends FormRequest
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
            'invoive_term' => 'required',
            'invoice_send_by' => 'required',
            'location' => 'required',
            'attention_invoice' => 'required',
            'batch_billing' => 'required',
            
        ];
    }
}
