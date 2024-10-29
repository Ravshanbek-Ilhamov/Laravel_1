<?php

namespace Database\Seeders;

use App\Models\OvqatMassalliq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OvqatMassalliqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OvqatMassalliq::factory(40)->create();
    }
}
