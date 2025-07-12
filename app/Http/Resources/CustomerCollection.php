<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function($customer){
                return [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'surnames' => $customer->surnames,
                    'phone' => $customer->phone,
                    'type_document' => $customer->type_document,
                    'document_number' => $customer->document_number,
                    'address' => $customer->address,
                ];
            })
        ];
    }
}
