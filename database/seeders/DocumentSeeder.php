<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all()->pluck('id')->toArray();

        foreach($customers as  $customer) {
            Document::create([
                'number_doc' => fake()->unique()->randomNumber(9, true),
                'document_type_id' => rand(1, 3),
                'customer_id' => $customer
            ]);
        }
    }
}
