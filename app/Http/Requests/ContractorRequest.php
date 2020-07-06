<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorRequest extends FormRequest
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
        //Validate the input data
        return [
            'company_name' => 'required',
            'company_type' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email'
        ];
    }
}
