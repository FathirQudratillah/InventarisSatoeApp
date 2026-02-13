<?php

namespace Database\Factories;

use App\Models\DataAkun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengajuanBarang>
 */
class PengajuanBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengajuan' => 'PGJ' . fake()->unique()->numerify('#####'),

            'user_id' => DataAkun::inRandomOrder()->value('user_id'),

            'nama_barang' => fake()->words(2, true),

            'status_pengajuan' => fake()->randomElement([
                'Pending',
                'Disetujui',
                'Ditolak'
            ]),

            'tanggal_pengajuan' => fake()->date(),

            'jumlah_pengajuan' => fake()->numberBetween(1, 10),
        ];
    }
}
