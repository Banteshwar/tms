<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverLicenseInsuranceInfo extends FormRequest
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
            'social_security_no' => 'required',
            'dob' => 'required',
            'cdl' => 'required',
            'dstate' => 'required',
            'cdl_exp_on' => 'required',
            'medical_card' => 'required',
            'medical_exp_on' => 'required',
            'insurance' => 'required',
            'twic_card' => 'required',
            'twic_exp_on' => 'required',
            'sealink_exp_on' => 'required',
            'fleet_one' => 'required'
        ];
    }
}
