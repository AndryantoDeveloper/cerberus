<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employee;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1;$i<=100;$i++){
        	
            factory(User::class)->create();

            $gender = ["MALE","FEMALE"];

            Employee::create([
                "fullname"=>$faker->firstName .' ' . $faker->lastName,
                "gender"=>$gender[rand(0,1)],
                "birth_date"=>date('Y-m-d'),
                "phone"=>$faker->phoneNumber,
                "email"=>$faker->unique()->safeEmail,
                "address"=>$faker->city,
             ]);

        }



    }
}
