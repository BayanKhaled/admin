<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    $factory->define(App\Note::class, function (Faker\Generator $faker) {
    static $password;

    return [
    'user_id' => 1,
    'title' => $faker->sentence(10),
    'body' => $faker->sentence(30),
    ];
    });
}
