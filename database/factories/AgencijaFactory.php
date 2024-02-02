<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Agencija;

use \Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agencija>
 */
class AgencijaFactory extends Factory
{

       protected $model=\App\Models\Agencija::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
              'naziv'=>$this->faker->company,
            'adresa'=>$this->faker->address,
            'telefon'=>$this->faker->phoneNumber,
            'gmail'=>$this->faker->email,
        ];
    }
}
