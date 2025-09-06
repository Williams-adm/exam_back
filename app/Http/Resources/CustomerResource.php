<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surnames' => $this->surnames,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender->type_gen,
            'country' => $this->country->name,
            'type_document' => $this->document->documentType->type_doc,
            'document' => $this->document->number_doc,
        ];
    }
}
