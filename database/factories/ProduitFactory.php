<?php

namespace Database\Factories;

use App\Models\produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'designation' => $this->faker->realText($maxNbChars = 100, $indeSize=2),
            'description' => $this->faker->realText($maxNbChars = 200, $indeSize=2),
            'prix' => $this->faker->numberBetween ($min = 500, $max = 10000),
            'like' => $this->faker->numberBetween ($min = 0, $max = 100),
            'pays_source' => $this->faker->country,
            'poids' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) ,
         ];
    }
}
