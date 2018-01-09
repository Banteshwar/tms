<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderLocationRequest extends FormRequest
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
            //
            'doing_in_location' => 'required',
            'location_name'  => 'required',
            'address'   => 'required',
            'city'  => 'required',
            'state' => 'required',
            'zip'   => 'required',
            'appointment_date'  => 'required',
            'contact_name'  => 'required',
            // 'phone' => 'required',
            // 'driving_direction' => 'required',
            'confirmation_no'   => 'required',
            // 'stop_off'  => 'required',
            // 'driver_instruction'    => 'required',



        ];
    }
}
