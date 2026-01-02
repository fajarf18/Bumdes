<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang' => $this->faker->unique()->numerify('BRG-####'),
            'gambar' => $this->faker->imageUrl(),
            'nama' => $this->faker->word(),
            'deskripsi' => $this->faker->paragraph(),
            'harga' => $this->faker->randomFloat(2, 1000, 1000000),
            'tanggal' => $this->faker->date(),
            'user_id' => 1,
            // Foreign keys will be overridden in seeder or use default null/factory if needed
            // 'kategori_id' => Kategori::factory(),
            // 'lokasi_id' => Lokasi::factory(),
            // 'satuan_id' => Satuan::factory(),
        ];
    }
}
