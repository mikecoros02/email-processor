<?php

namespace Database\Factories;

use App\Models\SuccessfulEmails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuccessfulEmails>
 */
class SuccessfulEmailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $title = $this->faker->realText(50);
        $email = "<h1>{$title}</h1>";
        foreach ($paragraphs as $paragraph) {
            $email .= "<p>{$paragraph}</p>";
        }

        return [
            'affiliate_id' => $this->faker->numberBetween(1, 1000),
            'envelope' => $this->faker->text(200),
            'from' => $this->faker->email,
            'subject' => $this->faker->sentence,
            'dkim' => $this->faker->optional()->lexify('????????????????????????????????????????????????'),
            'SPF' => $this->faker->optional()->lexify('????????????????????????????????????????????????'),
            'spam_score' => $this->faker->optional()->randomFloat(2, 0, 10),
            'email' => $email,
            'raw_text' => '',
            'sender_ip' => $this->faker->optional()->ipv4,
            'timestamp' => $this->faker->unixTime,
        ];
    }
}
