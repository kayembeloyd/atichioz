<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'description' => $this->faker->text(5000),
            'description_little' => $this->faker->text(500),
            'organization_id' => $this->faker->numberBetween(1,25)
            //
        ];
    }
}
