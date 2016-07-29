<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create('ne_NP');

        for( $i = 0; $i <=10; $i++  ) {

            $user = User::create([
                'email' => $faker->email,
                'password' => 'password',
                'phone' => $faker->phoneNumber,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'address' => $faker->address,
                'role_id' => rand(1,2)
            ]);

            echo $user->name . PHP_EOL;
        }
    }
}
