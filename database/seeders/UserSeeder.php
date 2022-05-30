<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@example.com",
            "password" => "admin",
            "role" => User::ROLE_ADMIN
        ]);



        User::factory(10)->create();
        User::factory(20)->create(["role" => User::ROLE_COMPANY]);
    }
}
