<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) { // Create 50 dummy customers
            Customer::create([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'status' => $faker->boolean,
                'email' => $faker->safeEmail,
                'contact' => $faker->phoneNumber,
                'address' => $faker->address,
                'postcode' => $faker->postcode,
                'country' => $faker->country
            ]);
        }
    }
}

