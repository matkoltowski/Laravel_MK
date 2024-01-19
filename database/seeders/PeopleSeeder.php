<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeopleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

		foreach (range(1, 200) as $index) {
			\App\Models\People::create([
			'first_name' => $faker->firstName,
			'last_name' => $faker->lastName,
			'phone_number' => $faker->phoneNumber,
			'street' => $faker->streetName,
			'city' => $faker->city
    ]);
}
    }
}

