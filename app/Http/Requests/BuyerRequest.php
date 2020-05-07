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
            'display_name' => 'nullable',
            'description' => 'nullable',
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
            //
        ];
    }

}
