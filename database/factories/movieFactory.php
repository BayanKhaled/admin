<?php

namespace Database\Factories;

use App\Models\movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class movieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        
        return [
            'title' => $this->faker->name,
            'desc' => $this->faker->name,
            'date' => $this->faker->name,
            'rate' => $this->faker->name,
            'actor_id' => 2,

        ];
        
    }
    

    /*
    $factory->define(class movie::class, function(Faker\Generator $faker) {
        return [
            'title' => $this->faker->sentence(10),
            'desc' => $this->faker->sentence(50),
            'date' => $this->faker->name,
            'rate' => $this->faker->name,
            'actor_id' => $this->faker->name,

        ];
    });
    */
}
