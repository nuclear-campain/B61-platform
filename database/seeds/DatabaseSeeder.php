<?php

use Illuminate\Database\Seeder;
use ActivismBe\Seeders\DatabaseSeeder as BaseSeeder;
use ActivismBe\Seeders\AclTableSeeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends BaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    { 
        parent::run(); // Initialize the base seeder. 

        // Run other seeds in the application. 
        $this->call(AclTableSeeder::class);
        $this->call(CityScaffoldingSeeder::class);
        $this->call(FragmentSeeder::class);
    }
}
