<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'terminalid' => 'required',
            'downer' => 'required',
            'dfname' => 'required',
            'dlname' => 'required',
            'daddress' => 'required',
            'dcity' => 'required',
            'dzip' => 'required',
            'dcontact' => 'required',
            'dphonecarrier' => 'required',
            'demail' => 'required',
            'dHiredDate' => 'required',
        ];
    }
}
