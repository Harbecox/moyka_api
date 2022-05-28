<?php

namespace Database\Seeders;

use App\Models\Pack;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $packs = Pack::all();
        /* @var $user User */
        foreach ($users as $user){
            /* @var $pack Pack */
            foreach ($packs->random(rand(0,5)) as $pack){
                Subscription::create([
                    "pack_id" => $pack->id,
                    "user_id" => $user->id,
                    "count" => $pack->count - rand(0,$pack->count),
                ]);
            }
        }
    }
}
