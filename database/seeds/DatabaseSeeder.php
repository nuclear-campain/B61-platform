<?php

use ActivismBe\Seeders\AclTableSeeder;
use ActivismBe\Seeders\DatabaseSeeder as BaseSeeder;
use Illuminate\Database\Seeder;

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
    }
}
