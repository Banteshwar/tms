<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderBasicRequest extends FormRequest
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

            'terminal' => 'required',
            'line_haul' => 'required',
            'import_export' => 'required',
            'customer_billee_name' => 'required',
            'appointment_date' => 'required',
            'reference' => 'required',
            'booking_bl' => 'required',
            'seal' => 'required',
            'load_weight' => 'required',
            'pickup' => 'required',
            // 'commodity' => 'required',
            'no_of_packages' => 'required',
            // 'eta' => 'required',
            // 'release_date' => 'required',
            // 'strong_lfd' => 'required',
            // 'perdlem_lfd' => 'required',
            'ship_rail_line' => 'required',
            // 'vessel' => 'required',
            // 'voyage' => 'required',
            'sch_at' => 'required',
            'terminated_at' => 'required',
            'sch_date' => 'required',
            'ter_date' => 'required',
            // 'basic_comments' => 'required',
            //
        ];
    }
}
