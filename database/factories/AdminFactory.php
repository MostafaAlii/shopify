<?php
declare (strict_types = 1);
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    public function definition() {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '123123', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified() {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
