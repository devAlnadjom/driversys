<?php

namespace Database\Seeders;

use App\Models\Carrental;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Vehicule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();
         Company::factory(10)->create();
         Carrental::factory(10)->create();
         Driver::factory(15)->create();
         Vehicule::factory(30)->create();
    }
}
