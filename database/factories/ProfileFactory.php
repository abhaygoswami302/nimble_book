<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random_email = User::all()->random()->email;
        $random_name = User::where('email','=', $random_email)->first();
        return [
            'name' => $random_name->name,
            'email' => $random_email,
            'address' => $this->faker->address,
            'designation' => $this->faker->jobTitle,
            'education' => $this->faker->randomElement(['PHD', 'MCA', 'B.Tech', 'M.Tech']),
            'description' => $this->faker->paragraph
        ];
    }
}
