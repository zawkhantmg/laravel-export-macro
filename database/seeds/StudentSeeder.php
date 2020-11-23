<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
        
        DB::table('students')->truncate();

        foreach (range(1, 10) as $index) {
            DB::table('students')->insert([
                'roll-no' => $faker->randomDigit,
                'name' => $faker->name,
                'email' => $faker->unique()->userName . '@' . 'gmail.com',
                'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            ]);
        }
    }
}
