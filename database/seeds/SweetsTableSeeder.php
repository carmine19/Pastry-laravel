<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Pastry;
use App\Sweet;

class SweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $pastries = Pastry::all();

        foreach ($pastries as $pastry) {
            for ($i=0; $i < 3; $i++) {
                $new_dish = new Sweet();
                $new_dish->name = $faker->words(3, true);
                $new_dish->description = $faker->paragraph();
                $new_dish->ingredients = $faker->words(10, true);
                $new_dish->cover = $faker->imageUrl(640, 480, 'food', true);
                $new_dish->price = $faker->randomFloat(2, 0, 4);
                $new_dish->visibility = $faker->numberBetween(0, 1);

                $new_dish->pastry_id = $pastry->id;

                $slug = Str::slug($new_dish->name);
                $slug_base = $slug;
                $test = Pastry::where('slug', $slug)->first();
                $counter = 1;
                while($test) {
                    $slug = $slug_base . '-' . $counter;
                    $counter++;
                    $test = Pastry::where('slug', $slug)->first();
                }
                $new_dish->slug = $slug;

                $new_dish->save();

            }
        }
    }
}
