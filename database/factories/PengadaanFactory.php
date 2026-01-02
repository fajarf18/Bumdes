<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengadaan>
 */
class PengadaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pengadaan' => $this->faker->words(3, true),
            'deskripsi' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'tanggal_pengajuan' => $this->faker->date(),
            'user_id' => 1,
            // 'lokasi_id' => Lokasi::factory(),
        ];
    }
}
