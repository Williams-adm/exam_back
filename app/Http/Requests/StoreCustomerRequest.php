<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'surnames' => 'required|string|min:3|max:50',
            'phone' => 'required|integer|unique:customers,phone',
            'address' => 'required|string|min:3',
            'gender_id' => 'required|integer|exists:genders,id',
            'country_id' => 'required|integer|exists:countries,id',
            'number_doc' => 'required|integer|unique:documents,number_doc|digits_between:8,12',
            'document_type' => 'required|integer|exists:document_types,id'
        ];
    }
}
