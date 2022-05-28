<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::query()->where("role",User::ROLE_COMPANY)->get()->map(function ($user){
            return $user->id;
        });
        $lat = [40.11965254582924,40.25091515312995];
        $lng = [44.4057765501451,44.606138727441454];
        return [
            "name" => $this->faker->company(),
            "phone" => $this->faker->e164PhoneNumber(),
            "lat" => $this->faker->randomFloat(10,$lat[0],$lat[1]),
            "lng" => $this->faker->randomFloat(10,$lng[0],$lng[1]),
            "user_id" => $this->faker->randomElement($users)
        ];
    }
}
