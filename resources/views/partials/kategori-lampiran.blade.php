{{-- Dipakai di form create/edit Surat Masuk & Surat Keluar. $surat hanya ada di form edit. --}}
<p>
    <span class="mb-1.5 flex items-center justify-between text-sm font-medium text-slate-700">
        Kategori:
        <span class="text-xs font-normal text-slate-400">Opsional</span>
    </span>
    <select name="category_id"
            class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm text-slate-900 outline-none transition focus:ring-2 @error('category_id') border-red-400 focus:border-red-500 focus:ring-red-100 @else border-slate-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">
        <option value="">-- Tanpa kategori --</option>
        @foreach ($categories as $kategori)
            <option value="{{ $kategori->id }}"
                @selected(old('category_id', $surat->category_id ?? '') == $kategori->id)>
                {{ $kategori->nama }}
            </option>
        @endforeach
    </select>
    @error('category_id') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
</p>
<p>
    <span class="mb-1.5 flex items-center justify-between text-sm font-medium text-slate-700">
        Lampiran (PDF/JPG/PNG, maks. 2 MB):
        <span class="text-xs font-normal text-slate-400">Opsional</span>
    </span>
    <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png"
           class="block w-full rounded-lg border bg-white text-sm text-slate-700 file:mr-4 file:cursor-pointer file:border-0 file:bg-indigo-50 file:px-4 file:py-2.5 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100 @error('lampiran') border-red-400 @else border-slate-300 @enderror">
    @if (!empty($surat->lampiran))
        <span class="mt-1 block text-xs text-slate-500">
            Lampiran saat ini:
            <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="font-medium text-indigo-600 hover:underline">Lihat lampiran</a>.
            Pilih file baru hanya jika ingin menggantinya.
        </span>
    @endif
    @error('lampiran') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
</p>