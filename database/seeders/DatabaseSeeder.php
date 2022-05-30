<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Pack;
use App\Models\Subscription;
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


        $user_co = User::create([
            "name" => "Company",
            "email" => "company@example.com",
            "password" => "admin",
            "role" => User::ROLE_COMPANY
        ]);

        $company = Company::factory(1)->create(['user_id' => $user_co->id])->first();

        $pack = Pack::factory(1)->create()->first();

        $pack->companies()->attach($company);

        $user = User::create([
            "name" => "User",
            "email" => "user@example.com",
            "password" => "admin",
            "role" => User::ROLE_USER
        ]);

        Subscription::create([
            "pack_id" => $pack->id,
            "user_id" => $user->id,
            "count" => $pack->count,
        ]);
    }
}
