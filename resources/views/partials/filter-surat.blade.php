{{-- Form pencarian + filter kategori. Butuh: $route (nama route index), $categories. --}}
<form method="GET" action="{{ route($route) }}" class="mb-4 flex flex-wrap items-center gap-2 rounded-2xl border border-slate-200 bg-white p-3 shadow-sm">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Nomor, pengirim/penerima, atau perihal"
           class="min-w-56 flex-1 rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
    <select name="category_id"
            class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
        <option value="">Semua kategori</option>
        @foreach ($categories as $kategori)
            <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>{{ $kategori->nama }}</option>
        @endforeach
    </select>
    <button type="submit" class="cursor-pointer rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">Cari / Filter</button>
    <a href="{{ route($route) }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">Reset</a>
</form>