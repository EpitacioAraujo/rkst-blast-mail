<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFactory extends Factory
{
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "title" => $this->faker->sentence(3),
            "body" => $this->faker->randomHtml(),
            "deleted_at" => $this->faker->optional(0.3)->dateTimeBetween("-3 days", "now"),
        ];
    }
}
