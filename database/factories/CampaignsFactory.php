<?php

namespace Database\Factories;

use App\Models\EmailList;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\campaigns>
 */
class CampaignsFactory extends Factory
{
    /**
     * Define the model"s default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(3),
            "body" => $this->faker->randomHtml(),
            "user_id" => User::factory(),
            "email_list_id" => EmailList::factory(),
            "template_id" => Template::factory(),
            "trace_open" => $this->faker->boolean(),
            "trace_clicked" => $this->faker->boolean(),
            "sent_at" => $this->faker->optional()->dateTimeBetween("-1 month", "now"),
            "deleted_at" => $this->faker->optional(0.7)->dateTimeBetween("-3 days", "now"),
        ];
    }
}
