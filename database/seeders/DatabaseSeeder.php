<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Company;
use App\Models\CompanyProduct;
use App\Models\Like;
use App\Models\Massalliq;
use App\Models\Order;
use App\Models\Ovqat;
use App\Models\OvqatMassalliq;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CategoryTableSeeder::class,
            PostsTableSeeder::class,
            CommentTableSeeder::class,
            CompanySeeder::class,
            CompanyProductSeeder::class,
            ProductTableSeeder::class,
            LikeTableSeeder::class,
            OrderTableSeeder::class,
            // OvqatSeeder::class,
            // MassalliqSeeder::class,
            // OvqatMassalliqSeeder::class,
        ]);

        for ($i=1; $i <=10 ; $i++) { 
            Ovqat::create(['name' => 'Ovqat ' . $i]);
        }

        for ($i=1; $i <=10 ; $i++) { 
            Massalliq::create(['name' => 'Massalliq ' . $i]);
        }

        for ($i=1; $i <=100 ; $i++) { 
            OvqatMassalliq::create(['ovqat_id' => rand(1,10),'massalliq_id' => rand(1,10)]);
        }
    }
}
