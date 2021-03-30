<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 2; $i++) {
            $new_user = new User();
            $new_user->name = $faker->firstName(null);
            $new_user->email = $faker->email();
            $new_user->password = strval($faker->randomNumber(8, true));
            $test = User::where('email', $new_user->email)->first();
            while ($test) {
                $new_user->email = $faker->email();
                $test = User::where('email', $new_user->email)->first();
            }
            $new_user->save();
        }
    }
}
