<?php

use Illuminate\Database\Seeder;
use App\Pastry;
use App\User;
use App\Sweet;
use Faker\Generator as Faker;

class PastryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         $users = User::all();

         foreach ($users as $user) {

                $new_rest = new Pastry();
                $new_rest->name = 'Pastry Pinton';
                $new_rest->user_id = $user->id;
                $new_rest->slug = 'Pastry Pinton';
                $new_rest->cover = 'https://www.bar.it/wp-content/uploads/2019/07/pasticceria-2308x1731.jpg';
                $new_rest->phone = '555-2232332';
                $new_rest->email = $faker->email();
                $new_rest->address = 'via roma 2, Milano';
                $slug = Str::slug($new_rest->name);
                $slug_base = $slug;
                $slug_presente = Pastry::where('slug', $slug)->first();
                $contatore = 1;
                while($slug_presente) {
                    $slug = $slug_base . '-' . $contatore;
                    $contatore++;
                    $slug_presente = Pastry::where('slug', $slug)->first();
                }
                $new_rest->slug = $slug;

                $new_rest->save();

            };
        }

}
