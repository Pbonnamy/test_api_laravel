<?php

namespace Database\Factories;

use App\Models\Immeuble;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImmeubleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Immeuble::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'name' => $this->faker->name(),
            'code_im' => $this->faker->numberBetween(0,9999),
            'code_soc' => $this->faker->numberBetween(0,9999),
        ];
    }
}
