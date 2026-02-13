<?php

namespace Database\Seeders;

use App\Models\PengajuanBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengajuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengajuanBarang::factory()->count(10)->create();
    }
}
