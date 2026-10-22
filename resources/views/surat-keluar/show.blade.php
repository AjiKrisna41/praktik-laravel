@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
    <h1>Detail surat Keluar</h1>

    @if ($surat)
        <p>
            <strong>Nomor Surat:</strong>
            {{ $surat-> nomor_surat }}
        </p>
        <p>
            <strong>Tanggal:</strong>
            {{ $surat-> tanggal }}
        </p>
        <p>
            <strong>Pengirim:</strong>
            {{ $surat-> Pengirim }}
        </p>
        <p>
            <strong>Perihal:</strong>
            {{ $surat-> perihal }}
        </p>
    @else
        <p>Surat Keluar tidak ditemukan</p>
    @endif

    <a href="{{ route('surat-keluar.index') }}">Kembali</a>

@endsection