<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-slate-50 font-sans text-slate-700 antialiased">
    <header class="sticky top-0 z-10 border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-3 px-4 py-3">
            <h2 class="flex items-center gap-2 text-lg font-semibold text-slate-900">
                <span class="grid size-8 place-items-center rounded-lg bg-indigo-600 text-sm font-bold text-white">S</span>
                Sistem Informasi Surat
            </h2>
            <nav class="flex flex-wrap items-center gap-1 text-sm">
                <a href="{{ route('dashboard') }}"
                    class="rounded-lg px-3 py-2 font-medium transition {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Dashboard</a>
                <a href="{{ route('surat-masuk.index') }}"
                    class="rounded-lg px-3 py-2 font-medium transition {{ request()->routeIs('surat-masuk.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Surat Masuk</a>
                <a href="{{ route('surat-keluar.index') }}"
                    class="rounded-lg px-3 py-2 font-medium transition {{ request()->routeIs('surat-keluar.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Surat Keluar</a>

                @auth
                    <span class="ml-2 rounded-full bg-slate-100 px-3 py-1 text-xs text-slate-600">Masuk sebagai: <span class="font-semibold text-slate-800">{{ auth()->user()->name }}</span></span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="cursor-pointer rounded-lg border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:border-red-300 hover:bg-red-50 hover:text-red-600">Keluar</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>
    <main class="mx-auto w-full max-w-5xl flex-1 px-4 py-8">
        @yield('content')
    </main>
    <footer class="border-t border-slate-200 bg-white py-4 text-center text-sm text-slate-500">
        <p>&copy; Sistem Informasi Surat</p>
    </footer>
</body>
</html>