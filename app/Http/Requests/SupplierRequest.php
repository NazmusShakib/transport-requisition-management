<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required',
            'short_name' => 'nullable',
            'contact_no' => 'nullable',
            'email' => 'sometimes|email',
            'website' => 'sometimes|nullable',
            'contact_person' => 'nullable',
            'designation' => 'nullable',
            'credit_limit_days' => 'nullable',
            'credit_limit_amount' => 'nullable',
            'address_1' => 'nullable',
            'address_2' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:6144',
            'companies_id' => 'sometimes|nullable|array',
            'companies_id.*' => 'sometimes|nullable|exists:companies,id',
            'buyers_id' => 'sometimes|nullable|array',
            'buyers_id.*' => 'sometimes|nullable|exists:buyers,id',
            'nature_id' => 'sometimes|nullable|exists:natures,id',
            'party_type_id' => 'sometimes|nullable|exists:party_types,id',
        ];
    }

    public function messages()
    {
        return [
            'buyers_id.*' => 'The selected buyers is invalid.',
            'companies_id.*' => 'The selected companies is invalid.'
        ];
    }

    public function attributes()
    {
        return [
            'nature_id' => 'nature', // This will replace any instance of 'nature_id' in validation messages with 'nature'
            'company_id' => 'company', // This will replace any instance of 'company_id' in validation messages with 'company'
        ];
    }
}
