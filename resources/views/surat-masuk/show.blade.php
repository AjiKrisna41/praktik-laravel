@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
    <h1>Detail surat Masuk</h1>

    @if ($surat)
        <p>
            <strong>ID:</strong>
            {{ $surat['id'] }}
        </p>
        <p>
            <strong>Nomor Surat:</strong>
            {{ $surat['nomor_surat'] }}
        </p>
        <p>
            <strong>Tanggal:</strong>
            {{ $surat['tanggal'] }}
        </p>
        <p>
            <strong>Pengirim:</strong>
            {{ $surat['Pengirim'] }}
        </p>
        <p>
            <strong>Perihal:</strong>
            {{ $surat['perihal'] }}
        </p>
    @else
        <p>Surat Masuk tidak ditemukan</p>
    @endif

    <a href="{{ route('surat-masuk.index') }}">Kembali</a>

@endsection