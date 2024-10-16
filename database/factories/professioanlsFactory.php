<?php

namespace Database\Factories;

use App\Models\professioanls;
use Illuminate\Database\Eloquent\Factories\Factory;

class professioanlsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = professioanls::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_title' => $this->faker->word,
        'experiance_years' => $this->faker->word,
        'hourly_wage' => $this->faker->word,
        'expected_distance' => $this->faker->word,
        'license' => $this->faker->word,
        'is_own_car' => $this->faker->word,
        'notes' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
