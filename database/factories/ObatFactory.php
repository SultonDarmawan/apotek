<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_obat' => $this->faker->unique()->randomElement(['Paracetamol', 'Vitacimin', 'Panadol', 'Ibuprofen', 'Paramex', 'Redoxon']),
            'kategori_id' => $this->faker->numberBetween(1, 4),
            'stok' => 0,
            'harga_beli' => $this->faker->randomElement([5000, 6000, 9000, 7000, 4000, 8000]),
            'harga_jual' => $this->faker->randomELement([15000, 20000, 14000, 18000, 17000, 20000]),
        ];
    }
}
