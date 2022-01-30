<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class JobFinderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'handicaps' => Arr::random(['ADHD', 'うつ', 'アスペルガー', '身体３級']),
            'skills' => Arr::random(['Java', 'PHP', 'HTML/CSS']),
            'occupation' => Arr::random(['Javaプログラマー', 'PHPプログラマー', 'HTML/CSSコーダー']),
            'description' => $this->faker->realText(20),
        ];
    }
}
