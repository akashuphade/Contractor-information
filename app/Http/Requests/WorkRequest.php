<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'short_desc' => 'required',
            'long_desc' => 'required',
            'start_date' => 'required|date',
            'completion_date' => 'required|date|after_or_equal:start_date',
            'penalty_rate' => 'required',
            'contractor' => 'required',
            'addr_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'road_type' => 'required',
            'expiry_date' => 'required|date'
        ];
    }
}
