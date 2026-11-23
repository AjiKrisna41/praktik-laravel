@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Kepala kartu --}}
            <div class="border-b border-indigo-100 bg-indigo-50 px-6 py-6">
                <span class="inline-flex items-center rounded-full bg-indigo-600 px-3 py-1 text-xs font-semibold text-white">Surat Masuk</span>
                <h1 class="mt-3 text-2xl font-bold text-slate-900">Detail Surat Masuk</h1>
                <p class="mt-1 text-sm text-slate-500">{{ $surat->nomor_surat }}</p>
            </div>

            {{-- Isi detail --}}
            <dl class="divide-y divide-slate-100">
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-semibold text-slate-500">Nomor Surat:</dt>
                    <dd class="font-medium text-slate-900 sm:col-span-2">{{ $surat->nomor_surat }}</dd>
                </div>
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-semibold text-slate-500">Tanggal:</dt>
                    <dd class="text-slate-900 sm:col-span-2">{{ $surat->tanggal }}</dd>
                </div>
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-semibold text-slate-500">Pengirim:</dt>
                    <dd class="text-slate-900 sm:col-span-2">{{ $surat->pengirim }}</dd>
                </div>
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-semibold text-slate-500">Perihal:</dt>
                    <dd class="text-slate-900 sm:col-span-2">{{ $surat->perihal }}</dd>
                </div>
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-semibold text-slate-500">Keterangan:</dt>
                    <dd class="whitespace-pre-line text-slate-900 sm:col-span-2">{{ $surat->keterangan ?? '-' }}</dd>
                </div>
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-semibold text-slate-500">Kategori:</dt>
                    <dd class="text-slate-900 sm:col-span-2">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</dd>
                </div>
                @if ($surat->lampiran)
                    <div class="grid gap-1 px-6 py-4 sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-semibold text-slate-500">Lampiran:</dt>
                        <dd class="sm:col-span-2">
                            <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener"
                                class="font-medium text-indigo-600 hover:underline">Lihat lampiran</a>
                        </dd>
                    </div>
                @endif
            </dl>

            {{-- Tombol --}}
            <div class="flex flex-wrap items-center gap-3 border-t border-slate-100 bg-slate-50 px-6 py-4">
                @can('manage-letters')
                <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">Edit</a>
                @endcan
                <a href="{{ route('surat-masuk.index') }}" class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100">Kembali</a>
            </div>
        </div>
    </div>
@endsection