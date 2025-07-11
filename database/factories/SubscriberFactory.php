<?php

namespace Database\Factories;

use App\Models\EmailList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmailList>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model"s default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "email" => $this->faker->safeEmail(),
            "name" => $this->faker->name(),
            "deleted_at" => $this->faker->optional(0.3)->dateTimeBetween("-3 days", "now"),
        ];
    }
}
