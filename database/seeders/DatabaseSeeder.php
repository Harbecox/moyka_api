<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(["title" => "Car washing" ]);

        $this->call(UserSeeder::class);
        $this->call(ComppanySeeder::class);
        $this->call(PackSeeder::class);
        $this->call(SubscriptionSeeder::class);
    }
}
