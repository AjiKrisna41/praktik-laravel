<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;


class IncomingLetterSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('incoming_letters')->insert(
            [
                [
                    'nomor_surat'   => 'Surat Masuk 1',
                    'tanggal'       => '2023-01-01',
                    'pengirim'      => 'Pengirim 1',
                    'perihal'       => 'Perihal 1',
                    'keterangan'    => 'Undangan Rapat Koordinasi',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [ 
                    'nomor_surat'   => 'Surat Masuk 2', 
                    'tanggal'       => '2023-01-02', 
                    'pengirim'      => 'Pengirim 2', 
                    'perihal'       => 'Perihal 2',
                    'keterangan'    => 'Undangan Rapat Akademik',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ],
                [ 
                    'nomor_surat'   => 'Surat Masuk 3', 
                    'tanggal'       => '2023-01-03', 
                    'pengirim'      => 'Pengirim 3', 
                    'perihal'       => 'Perihal 3',
                    'keterangan'    => 'Undangan Rapat Sosialisasi PKL',
                    'created_at'    => now(),
                    'updated_at'    => now()
                ]
            ]
        );
    }
}
