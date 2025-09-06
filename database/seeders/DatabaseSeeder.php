<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CountrySeeder::class,
            DocumentTypeSeeder::class,
            GenderSeeder::class,
        ]);

        Customer::factory(8)->create();
        /* Document::factory(8)->create(); */
        /* Employee::factory(6)->create();
        Brand::factory(10)->create(); */

        $this->call([
            DocumentSeeder::class,
            UserSeeder::class
        ]);
    }
}
