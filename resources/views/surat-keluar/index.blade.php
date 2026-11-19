@extends('layouts.app')

@section('title', 'Daftar Surat Keluar')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-2xl font-bold text-slate-900">Daftar Surat Keluar</h1>

        @can('manage-letters')
            <a href="{{ route('surat-keluar.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">+ Tambah Surat</a>
        @endcan
    </div>
    @if (session('success'))
        <p class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">{{ session('success') }}</p>
    @endif

    <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600">
            <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Nomor Surat</th>
                <th class="px-4 py-3">Tanggal Surat</th>
                <th class="px-4 py-3">Penerima</th>
                <th class="px-4 py-3">Perihal</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse ($suratKeluar as $surat)
                <tr class="transition hover:bg-indigo-50/50">
                    <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
                    <td class="px-4 py-3">{{ $surat->tanggal }}</td>
                    <td class="px-4 py-3">{{ $surat->pengirim }}</td>
                    <td class="px-4 py-3">{{ $surat->perihal }}</td>
                    <td class="px-4 py-3">
                        <div class="flex flex-wrap items-center gap-2">
                        <a href="{{ route('surat-keluar.show', $surat->id) }}" class="rounded-md bg-sky-50 px-2.5 py-1 text-xs font-semibold text-sky-700 transition hover:bg-sky-100">Detail</a>
                        @can('manage-letters')
                            <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="rounded-md bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">Edit</a>
                            <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
                                    method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="cursor-pointer rounded-md bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700 transition hover:bg-red-100"
                                    onclick="return confirm('Hapus surat ini?')">Hapus</button>
                            </form>
                        @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-10 text-center text-slate-500">Belum ada data surat keluar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
@endsection