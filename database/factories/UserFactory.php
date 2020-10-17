<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use App\Models\movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    /*
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
    */

    $factory->define(App\Post::class, function(Faker\Generator $faker) {
        return [
            'title' => $faker->sentence(10),
            'body' => $faker->sentence(50),
        ];
    });

    $factory->define(class Admin::class, function(Faker\Generator $faker) {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    });

    $factory->define(class movie::class, function(Faker\Generator $faker) {
        return [
            'title' => $this->faker->sentence(10),
            'desc' => $this->faker->sentence(50),
            'date' => $this->faker->name,
            'rate' => $this->faker->name,
            'actor_id' => $this->faker->name,

        ];
    });


}
