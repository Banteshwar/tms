<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'full_name' => 'required', 
            'started_date' => 'required', 
            'credit_limit' => 'required', 
            'balance_outstanding' => 'required', 
            'credit_alert' => 'required', 
            'customer_status' => 'required',
            'grace_load' => 'required', 
            'Comments' => 'required'
        ];
    }
}
