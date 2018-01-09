<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckApDeductionRequest extends FormRequest
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
            'account_type' => 'required',
            'open_date' => 'required',
            'frequency' => 'required',
            'deduction_amount' => 'required',
            'deduction' => 'required',
            'limit_cycle' => 'required',
            'maximum_limit' => 'required|numeric',
            'total_collected' => 'required',
            // 'disp_tot_coltd' => 'required',
            // 'start_after' => 'required',
            // 'comment_setlmnt' => 'required',
            // 'comments' => 'required',
            // 'accumulate' => 'required',
            // 'due' => 'required',
            // 'installment' => 'required',
            'acount_status' => 'required'
        ];
    }
}
