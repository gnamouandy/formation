<?php

namespace Database\Factories;

use App\Models\ministere;
use Illuminate\Database\Eloquent\Factories\Factory;

class MinistereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ministere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->realText($maxNbChars = 100, $indeSize=2),
            'ministre_nom' => $this->faker->realText($maxNbChars = 100, $indeSize=2),
            'ministre_nomination_date' => $this->faker->dateTimeAD($max = 'now', $timezone = null),
            'adresse' => $this->faker->address,
            'boite_postale' => $this->faker->postcode,
        ];
    }
}
