<?php

namespace Database\Factories;

use App\Models\CatatanRenungan;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatatanRenunganFactory extends Factory
{
    protected $model = CatatanRenungan::class;

    public function definition()
    {
        return [
            'prinsip' => $this->faker->sentence(),
            'penerapan' => $this->faker->randomElement(['Penerapan 1', 'Penerapan 2', 'Penerapan 3']),
            'label' => $this->faker->word(),
        ];
    }
}