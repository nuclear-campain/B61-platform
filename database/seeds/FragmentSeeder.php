<?php

use App\Models\Fragment;
use Illuminate\Database\Seeder;

/**
 * Class FragmentSeeder
 */
class FragmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Fragment::create(['title' => 'Petition text', 'slug' => 'petition', 'content' => 'Petition text']);
    }
}
