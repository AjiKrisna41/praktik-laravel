<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = [
            [
                'id'            => 1,
                'nomor_surat'   => 'Surat Masuk 1',
                'tanggal'       => '2023-01-01',
                'Pengirim'      => 'Pengirim 1',
                'perihal'       => 'Perihal 1',
            ],
            [
                'id'            => 2, 
                'nomor_surat'   => 'Surat Masuk 2', 
                'tanggal'       => '2023-01-02', 
                'Pengirim'      => 'Pengirim 2', 
                'perihal'       => 'Perihal 2'
            ],
            [
                'id'            => 3, 
                'nomor_surat'   => 'Surat Masuk 3', 
                'tanggal'       => '2023-01-03', 
                'Pengirim'      => 'Pengirim 3', 
                'perihal'       => 'Perihal 3'
            ]
        ];
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function show($id)
    {
        return 'Detail Surat Masuk dengan ID: ' . $id;
    }
}
