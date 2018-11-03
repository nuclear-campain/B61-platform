<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    { 
        if ($this->resetDatabase()) {
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, starting from blank database.');
        }


        // Run other seeds in the application. 
        $this->call(CityScaffoldingSeeder::class);
        $this->call(AclUserScaffoldingSeeder::class);
    }

    /**
     * Function for determining if we need to reset the database storage or not. 
     * 
     * @return bool
     */
    protected function resetDatabase(): bool 
    {
        return ! app()->environment(['production', 'prod']) 
            && $this->command->confirm('Do you wish to refresh migrations before seeding, it will clear all old data?');
    }
}
