@extends('layouts.app')

@section('title' , 'dashboard')

@section('content')

    {{-- Banner sapaan --}}
    <section class="relative overflow-hidden rounded-2xl bg-blue-600 p-6 shadow-sm sm:p-8">
        <div class="absolute -right-8 -top-8 size-32 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-10 right-20 size-20 rounded-full bg-white/10"></div>

        <div class="relative flex flex-wrap items-center gap-5">
            <div class="grid size-16 shrink-0 place-items-center rounded-full bg-white text-2xl font-bold text-blue-600">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="min-w-0 flex-1">
                <h1 class="text-2xl font-bold text-white sm:text-3xl">Halo, {{ auth()->user()->name }}</h1>
                <p class="mt-1 text-blue-100">Selamat Datang Di Sistem Manajemen Surat</p>
            </div>

            <span class="inline-flex items-center gap-2 rounded-full bg-white/20 px-4 py-1.5 text-sm font-semibold capitalize text-white ring-1 ring-white/30">
                <span class="size-2 rounded-full bg-white"></span>
                {{ auth()->user()->role }}
            </span>
        </div>
    </section>

    {{-- Ringkasan jumlah surat --}}
    <section class="mt-8 grid gap-5 sm:grid-cols-2">
        <a href="{{ route('surat-masuk.index') }}"
            class="group flex items-center gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-indigo-300 hover:shadow-md">
            <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-indigo-50 text-indigo-600 transition group-hover:bg-indigo-600 group-hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Total Surat Masuk</p>
                <p class="text-3xl font-bold text-slate-900">{{ \App\Models\IncomingLetter::count() }}</p>
            </div>
            <span class="ml-auto text-slate-300 transition group-hover:translate-x-1 group-hover:text-indigo-500">&rarr;</span>
        </a>

        <a href="{{ route('surat-keluar.index') }}"
            class="group flex items-center gap-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-sky-300 hover:shadow-md">
            <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sky-50 text-sky-600 transition group-hover:bg-sky-500 group-hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Total Surat Keluar</p>
                <p class="text-3xl font-bold text-slate-900">{{ \App\Models\OutgoingLetter::count() }}</p>
            </div>
            <span class="ml-auto text-slate-300 transition group-hover:translate-x-1 group-hover:text-sky-500">&rarr;</span>
        </a>
    </section>

    {{-- Akses cepat --}}
    <section class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-slate-900">Akses Cepat</h2>

        <div class="mt-4 flex flex-wrap gap-3">
            <a href="{{ route('surat-masuk.index') }}"
                class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">Lihat Surat Masuk</a>
            <a href="{{ route('surat-keluar.index') }}"
                class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">Lihat Surat Keluar</a>

            @can('manage-letters')
                <a href="{{ route('surat-masuk.create') }}"
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">+ Tambah Surat Masuk</a>
                <a href="{{ route('surat-keluar.create') }}"
                    class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700">+ Tambah Surat Keluar</a>
            @endcan
        </div>

        @cannot('manage-letters')
            <p class="mt-4 rounded-lg bg-amber-50 px-4 py-3 text-sm text-amber-700">
                Akun Anda hanya dapat melihat data surat. Penambahan, perubahan, dan penghapusan khusus untuk petugas.
            </p>
        @endcannot
    </section>

@endsection