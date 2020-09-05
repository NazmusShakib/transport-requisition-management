<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkOrderRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'delivery_date' => 'sometimes|nullable|date',
            'place_of_delivery' => 'sometimes|nullable',
            'ready_to_approve' => 'sometimes|nullable',
            'tenor' => 'sometimes|nullable',
            'pay_term' => 'sometimes|nullable',
            'pay_mode' => 'sometimes|nullable',
            'location_id' => 'required|exists:locations,id',
            'source_id' => 'sometimes|nullable|exists:sources,id',
            'part_of_loading' => 'sometimes|nullable',
            'attention' => 'sometimes|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'company', // This will replace any instance of 'company_id' in validation messages with 'company'
            'supplier_id' => 'supplier',
            'location_id' => 'location',
            'source_id' => 'sources',
        ];
    }
}
