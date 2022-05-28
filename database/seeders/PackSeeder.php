<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Pack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $packs = Pack::factory(10)->create();
        /* @var $pack Pack */
        foreach ($packs as $pack){
            $pack->companies()->attach($companies->random(rand(10,50)));
        }
    }
}
