<?php

namespace Database\Seeders;

use App\Models\DataKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelass = [
            ['id_kelas' => '10RPLB', 'id_jurusan' => 'RPL', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10RPLA', 'id_jurusan' => 'RPL', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11RPLB', 'id_jurusan' => 'RPL', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11RPLA', 'id_jurusan' => 'RPL', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12RPLB', 'id_jurusan' => 'RPL', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12RPLA', 'id_jurusan' => 'RPL', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10TKJB', 'id_jurusan' => 'TKJ', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10TKJA', 'id_jurusan' => 'TKJ', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11TKJB', 'id_jurusan' => 'TKJ', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11TKJA', 'id_jurusan' => 'TKJ', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12TKJB', 'id_jurusan' => 'TKJ', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12TKJA', 'id_jurusan' => 'TKJ', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10DPBB', 'id_jurusan' => 'DPB', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10DPBA', 'id_jurusan' => 'DPB', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11DPBB', 'id_jurusan' => 'DPB', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11DPBA', 'id_jurusan' => 'DPB', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12DPBB', 'id_jurusan' => 'DPB', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12DPBA', 'id_jurusan' => 'DPB', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10AKNB', 'id_jurusan' => 'AKN', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10AKNA', 'id_jurusan' => 'AKN', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11AKNB', 'id_jurusan' => 'AKN', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11AKNA', 'id_jurusan' => 'AKN', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12AKNB', 'id_jurusan' => 'AKN', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12AKNA', 'id_jurusan' => 'AKN', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10TKRB', 'id_jurusan' => 'TKR', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10TKRA', 'id_jurusan' => 'TKR', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11TKRB', 'id_jurusan' => 'TKR', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11TKRA', 'id_jurusan' => 'TKR', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12TKRB', 'id_jurusan' => 'TKR', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12TKRA', 'id_jurusan' => 'TKR', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10TPLB', 'id_jurusan' => 'TPL', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10TPLA', 'id_jurusan' => 'TPL', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11TPLB', 'id_jurusan' => 'TPL', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11TPLA', 'id_jurusan' => 'TPL', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12TPLB', 'id_jurusan' => 'TPL', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12TPLA', 'id_jurusan' => 'TPL', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10TPMB', 'id_jurusan' => 'TPM', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10TPMA', 'id_jurusan' => 'TPM', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11TPMB', 'id_jurusan' => 'TPM', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11TPMA', 'id_jurusan' => 'TPM', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12TPMB', 'id_jurusan' => 'TPM', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12TPMA', 'id_jurusan' => 'TPM', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
            
            ['id_kelas' => '10DKVB', 'id_jurusan' => 'DKV', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'A'],
            ['id_kelas' => '10DKVA', 'id_jurusan' => 'DKV', 'angkatan'=> '29', 'kelas' => '10', 'subkelas' => 'B'],
            ['id_kelas' => '11DKVB', 'id_jurusan' => 'DKV', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'A'],
            ['id_kelas' => '11DKVA', 'id_jurusan' => 'DKV', 'angkatan'=> '28', 'kelas' => '11', 'subkelas' => 'B'],
            ['id_kelas' => '12DKVB', 'id_jurusan' => 'DKV', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'A'],
            ['id_kelas' => '12DKVA', 'id_jurusan' => 'DKV', 'angkatan'=> '27', 'kelas' => '12', 'subkelas' => 'B'],
           
        ];

        foreach ($kelass as $kelas) {
            DataKelas::updateOrCreate(
                ['id_kelas' => $kelas['id_kelas']],
                [
                    'id_jurusan' => $kelas['id_jurusan'],
                    'angkatan' => $kelas['angkatan'],
                    'kelas' => $kelas['kelas'],
                    'subkelas' => $kelas['subkelas'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
