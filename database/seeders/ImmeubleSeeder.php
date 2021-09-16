<?php

namespace Database\Seeders;

use App\Models\Immeuble;
use Illuminate\Database\Seeder;

class ImmeubleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Immeuble::factory()
            ->count(10)
            ->create();
    }
}