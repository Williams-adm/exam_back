<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
            'name' => 'sometimes|string|min:3|max:50',
            'surnames' => 'sometimes|string|min:3|max:50',
            'phone' => ['sometimes', 'integer', Rule::unique('customers')->ignore($this->route('customer'))],
            'address' => 'sometimes|string|min:3',
            'gender_id' => 'sometimes|integer|exists:genders,id',
            'country_id' => 'sometimes|integer|exists:countries,id',
            'number_doc' => [
                'sometimes',
                'integer',
                'digits_between:8,12',
                Rule::unique('documents', 'number_doc')->ignore($this->documentId()),
            ],
            'document_type' => 'sometimes|integer|exists:document_types,id'
        ];
    }

    public function documentId(): ?int
    {
        $customerId = $this->route('customer');

        if (!$customerId) {
            return null;
        }

        $customer = \App\Models\Customer::with('document')->find($customerId);
        return $customer?->document?->id;
    }
}

