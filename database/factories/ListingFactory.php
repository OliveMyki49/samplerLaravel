<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'company' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'location' => $this->faker->city(),
<<<<<<< HEAD
            'description' => $this->faker->paragraph(5)
=======
            'description' => $this->faker->paragraph(5),
>>>>>>> 219a5cecbd5032b7237a678353080091c1472318
        ];
    }
}
