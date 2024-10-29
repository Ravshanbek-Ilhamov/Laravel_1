<?php

namespace Database\Seeders;

use App\Models\Massalliq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MassalliqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Massalliq::factory(20)->create();
    }
}
