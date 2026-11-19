<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login SIM-Surat</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans antialiased">
    <div class="grid min-h-screen lg:grid-cols-2">

        {{-- Panel kiri: identitas aplikasi (hanya tampil di layar lebar) --}}
        <aside class="relative hidden overflow-hidden bg-indigo-600 p-12 text-white lg:flex lg:flex-col lg:justify-between">
            <div class="absolute -right-16 -top-16 size-72 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-24 -left-10 size-80 rounded-full bg-white/10"></div>

            <div class="relative flex items-center gap-3">
                <span class="grid size-11 place-items-center rounded-xl bg-white text-xl font-bold text-indigo-600">S</span>
                <span class="text-lg font-semibold">Sistem Informasi Surat</span>
            </div>

            <div class="relative max-w-md">
                <h2 class="text-4xl font-bold leading-tight">Kelola surat masuk dan keluar dengan lebih rapi.</h2>
                <p class="mt-4 text-indigo-100">Masuk untuk mulai mencatat dan melihat data surat dalam satu tempat.</p>

                <ul class="mt-8 space-y-4 text-indigo-50">
                    <li class="flex items-center gap-3">
                        <span class="grid size-6 place-items-center rounded-full bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </span>
                        Catat surat masuk dengan rapi
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="grid size-6 place-items-center rounded-full bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </span>
                        Catat surat keluar dengan rapi
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="grid size-6 place-items-center rounded-full bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                        </span>
                        Akses disesuaikan dengan peran pengguna
                    </li>
                </ul>
            </div>

            <p class="relative text-sm text-indigo-200">&copy; Sistem Informasi Surat</p>
        </aside>

        {{-- Panel kanan: form login --}}
        <main class="flex items-center justify-center p-6 sm:p-10">
            <div class="w-full max-w-sm">

                {{-- Logo (hanya tampil di layar kecil) --}}
                <div class="mb-8 flex items-center gap-3 lg:hidden">
                    <span class="grid size-10 place-items-center rounded-xl bg-indigo-600 text-lg font-bold text-white">S</span>
                    <span class="font-semibold text-slate-900">Sistem Informasi Surat</span>
                </div>

                <h1 class="text-3xl font-bold text-slate-900">Login SIM-Surat</h1>
                <p class="mt-2 text-slate-500">Masuk untuk mengelola surat masuk dan keluar</p>

                <form method="POST" action="{{ route('login.submit') }}" class="mt-8 space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">Email</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 grid w-11 place-items-center text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" /></svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                                    class="w-full rounded-xl border bg-white py-3 pl-11 pr-4 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-2 @error('email') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-100 @enderror">
                        </div>
                        @error('email')
                            <p class="mt-2 flex items-center gap-1.5 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9L2.4 18a2 2 0 001.7 3h15.8a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700">Password</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 grid w-11 place-items-center text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 10-8 0v4m-2 0h12a1 1 0 011 1v8a1 1 0 01-1 1H6a1 1 0 01-1-1v-8a1 1 0 011-1z" /></svg>
                            </span>
                            <input id="password" type="password" name="password" placeholder="Masukkan password"
                                   class="w-full rounded-xl border bg-white py-3 pl-11 pr-4 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:ring-2 @error('password') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-100 @enderror">
                        </div>
                        @error('password')
                            <p class="mt-2 flex items-center gap-1.5 text-sm text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9L2.4 18a2 2 0 001.7 3h15.8a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full cursor-pointer rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 active:scale-[0.99]">
                        Masuk
                    </button>
                </form>

                <p class="mt-8 text-center text-xs text-slate-400">&copy; Sistem Informasi Surat</p>
            </div>
        </main>
    </div>
</body>
</html>