<?php

namespace Database\Factories;

use App\Models\JobFinder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_finder_id' => JobFinder::factory(),
            'content' => $this->faker->realTextBetween(10, 20),
            'title' => $this->faker->realTextBetween(10, 20),
            'url' => $this->faker->url(),
            'languages' => Arr::random(['Java', 'PHP', 'HTML/CSS']),
            'creation_time' => $this->faker->numberBetween(0, 24),
            'description' => $this->faker->realTextBetween(10, 200),
        ];
    }
}
