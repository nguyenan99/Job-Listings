<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1, 4) as $id)
        {
            $company = \App\Models\Company::create(['name' => $faker->unique()->company]);
        }
    }
}
