<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Truck extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'truck_type' => 'required',
            'terminal' => 'required',
            'Owner' => 'required',
            'current_driver' => 'required',
            'model' => 'required',
            'year' => 'required', 
            'vin_no' => 'required',
            'license_plate_no' => 'required',
            'state' => 'required',  
            'service_start_date' => 'required',
            'reg_expires_on' => 'required', 
            'anul_insp_expir_on' => 'required',
            'quart_inst_expir' => 'required',
            'bobtl_insur_expir' => 'required'
        ];
    }
}
