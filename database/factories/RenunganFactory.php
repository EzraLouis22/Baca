<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Renungan>
 */
class RenunganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->judul(),
            'date_renungan' => fake()->date_renungan(),
            'bacaan' => fake()->bacaan(),
            'ayat_bacaan' => fake()->ayat_bacaan(),
            'ayat_kunci' => fake()->ayat_kunci(),
            'isi_renungan' => fake()->isi_renungan(),
            'refleksi' => fake()->refleksi(),
            'pertanyaan' => fake()->pertanyaan(),
            'penerapan1' => fake()->penerapan1(),
            'penerapan2' => fake()->penerapan2(),
            'penerapan3' => fake()->penerapan3(),
            'prinsip' => fake()->prinsip(),
            'doa' => fake()->doa()
        ];
    }
}
