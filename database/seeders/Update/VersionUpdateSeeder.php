<?php

namespace Database\Seeders\Update;

use Illuminate\Database\Seeder;
use Database\Seeders\UpdateFeatureSeeder;
use Database\Seeders\Admin\SectionHasPageSeeder;

class VersionUpdateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //version Update Seeders
        $this->call([
            UpdateFeatureSeeder::class,
            SectionHasPageSeeder::class,
        ]);



    }
}
