<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name' =>'required',
            'business_name' =>'required',
            'type' => 'required',
            // 'other_type' =>'required',
            'address' =>'required',
            'city' =>'required',
            'state' =>'required',
            'zip' =>'required',
            'tin' => 'required',
            // 'ssn' =>'required',
            // 'ein' =>'required',
            'paid_by' => 'required',
            // 'comments' =>'required',
            'terminal' => 'required'
        ];
    }
}
