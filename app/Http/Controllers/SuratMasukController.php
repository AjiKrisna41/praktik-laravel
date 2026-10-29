<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomingLetter;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = IncomingLetter::all();    

        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        IncomingLetter::create($validated);
        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan.');
    }

    public function show($id)
    {
        $surat = IncomingLetter::find($id);

        return view('surat-masuk.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = IncomingLetter::find($id);

        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        IncomingLetter::where('id', $id)->update($validated);
        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        IncomingLetter::destroy($id);
        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus.');
    }
}
