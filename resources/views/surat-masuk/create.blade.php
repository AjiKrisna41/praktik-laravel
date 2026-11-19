@extends('layouts.app')
@section('title', 'Tambah Surat Masuk')
@section('content')
    <div class="mx-auto max-w-2xl">
        <form action="{{ route('surat-masuk.store') }}" method="POST" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            @csrf

            {{-- Kepala kartu --}}
            <div class="border-b border-indigo-100 bg-indigo-50 px-6 py-6">
                <span class="inline-flex items-center rounded-full bg-indigo-600 px-3 py-1 text-xs font-semibold text-white">Surat Masuk</span>
                <h1 class="mt-3 text-2xl font-bold text-slate-900">Tambah Surat Masuk</h1>
                <p class="mt-1 text-sm text-slate-500">Isi data surat yang diterima lalu simpan.</p>
            </div>

            {{-- Isi form --}}
            <div class="space-y-5 p-6">
                <div class="grid gap-5 sm:grid-cols-2">
                    <p>
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Nomor Surat:</span>
                        <input name="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Contoh: 001/SM/XI/2026"
                               class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-2 @error('nomor_surat') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">
                        @error('nomor_surat') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                    </p>
                    <p>
                        <span class="mb-1.5 block text-sm font-medium text-slate-700">Tanggal:</span>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                               class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-900 outline-none transition focus:ring-2 @error('tanggal') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">
                        @error('tanggal') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                    </p>
                </div>

                <p>
                    <span class="mb-1.5 block text-sm font-medium text-slate-700">Pengirim:</span>
                    <input name="pengirim" value="{{ old('pengirim') }}" placeholder="Nama instansi atau orang pengirim"
                           class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-2 @error('pengirim') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">
                    @error('pengirim') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                </p>
                <p>
                    <span class="mb-1.5 block text-sm font-medium text-slate-700">Perihal:</span>
                    <input name="perihal" value="{{ old('perihal') }}" placeholder="Inti atau judul surat"
                           class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-2 @error('perihal') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">
                    @error('perihal') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                </p>
                <p>
                    <span class="mb-1.5 flex items-center justify-between text-sm font-medium text-slate-700">
                        Keterangan:
                        <span class="text-xs font-normal text-slate-400">Opsional</span>
                    </span>
                    <textarea name="keterangan" rows="4" placeholder="Catatan tambahan (boleh dikosongkan)"
                                class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-2 @error('keterangan') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">{{ old('keterangan') }}</textarea>
                    @error('keterangan') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                </p>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-wrap items-center gap-3 border-t border-slate-100 bg-slate-50 px-6 py-4">
                <button type="submit" class="cursor-pointer rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">Simpan</button>
                <a href="{{ route('surat-masuk.index') }}" class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100">Batal</a>
            </div>
        </form>
    </div>
@endsection