<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequisitionRequest extends FormRequest
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
            'requisition_date' => 'sometimes|nullable|date',
            'delivery_date' => 'sometimes|nullable|date',
            'remarks' => 'sometimes|nullable',
            'ready_to_approve' => 'sometimes|nullable',
            'iso_no' => 'sometimes|nullable',
            'manual_requisition_no' => 'sometimes|nullable',
            'pay_mode' => 'sometimes|nullable',
            'company_id' => 'sometimes|nullable|exists:companies,id',
            'department_id' => 'sometimes|nullable|exists:departments,id',
            'store_id' => 'sometimes|nullable|exists:stores,id',
            'location_id' => 'sometimes|nullable|exists:locations,id',
            'section_id' => 'sometimes|nullable|exists:sections,id',
            'division_id' => 'sometimes|nullable|exists:divisions,id',
            'source_id' => 'sometimes|nullable|exists:sources,id',
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
            'department_id' => 'department',
            'store_id' => 'store',
            'location_id' => 'location',
            'section_id' => 'section',
            'division_id' => 'division',
            'source_id' => 'sources',
        ];
    }
}
