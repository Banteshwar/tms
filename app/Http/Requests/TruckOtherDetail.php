<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckOtherDetail extends FormRequest
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
            'truck' => 'required',
            'track_fuel_usage' => 'required',
            'physical_damage' => 'required',
            'physical_damage_text' => 'required',
            'non_truck_lib' => 'required',
            'calculate_ifta' => 'required',
            'calculate_ifta_text' => 'required',
            'ny_hut' => 'required',
            'parking_at_compy_yard' => 'required',
            'referred_by_truck' => 'required'
        ];
    }
}
