<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComppanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory(50)->create();
        $categories = Category::all();

        foreach ($companies as $company){
            $company->categories()->create(
                ["category_id" => $categories->random(1)->first()->id]
            );
        }
    }
}
