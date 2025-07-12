<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'surnames' => $employee->surnames,
                    'phone' => $employee->phone,
                    'email' => $employee->email,
                    'salary' => $employee->salary, 
                    'type_document' => $employee->type_document,
                    'document_number' => $employee->document_number,
                    'address' => $employee->address,
                ];
            })
        ];
    }
}
