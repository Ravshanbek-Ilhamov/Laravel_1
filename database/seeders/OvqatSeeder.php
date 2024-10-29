<?php

namespace Database\Seeders;

use App\Models\Ovqat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OvqatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ovqat::factory(20)->create();
    }
}
