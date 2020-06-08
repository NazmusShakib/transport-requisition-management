<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                $nameRules = "required|unique:buyers,name,{$this->id},id,deleted_at,NULL";
                break;
            default:
                $nameRules = "required|unique:buyers,name,NULL,id,deleted_at,NULL";
                break;
        }

        return [
            'name' => $nameRules,
            'email' => 'sometimes|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'company_id' => 'sometimes|nullable|exists:party_types,id',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'company', // This will replace any instance of 'company_id' in validation messages with 'company'
        ];
    }

}
