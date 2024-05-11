<?php

namespace Database\Factories;

use App\Models\Urmsuseruser;
use Illuminate\Database\Eloquent\Factories\Factory;

class UrmsuserFactory extends Factory
{
    protected $model = UrmsuserFactory::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18, 80),
            'nickname' => $this->faker->userName,
        ];
    }
}