<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infaq;

class InfaqController extends Controller
{
    public function index()
    {
        $infaqs = Infaq::all();
        $pageTitle = 'Tabel Keuangan Infaq';
        return view('admin.keuangan.list', compact('infaqs', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Tambah Infaq';
        return view('admin.keuangan.add', compact('pageTitle'));
    }

    public function store(Request $request)
{
    // Bersihkan nominal: hapus semua karakter bukan angka
    $cleanNominal = preg_replace('/\D/', '', $request->nominal);

    // Merge balik ke request supaya bisa divalidasi
    $request->merge(['nominal' => $cleanNominal]);

    $request->validate([
        'tanggal' => 'required|date',
        'nominal' => 'required|integer|min:0',
        'keterangan' => 'required|string|max:255',
    ]);

    Infaq::create($request->all());

    return redirect()->route('admin.keuangan.list')->with('success', 'Data infaq berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    // Bersihkan nominal dulu
    $cleanNominal = preg_replace('/\D/', '', $request->nominal);
    $request->merge(['nominal' => $cleanNominal]);

    $request->validate([
        'tanggal' => 'required|date',
        'nominal' => 'required|integer|min:0',
        'keterangan' => 'required|string|max:255',
    ]);

    $infaq = Infaq::findOrFail($id);
    $infaq->update($request->all());

    return redirect()->route('admin.keuangan.list')->with('success', 'Data infaq berhasil diperbarui.');
}


    public function edit($id)
    {
        $infaq = Infaq::findOrFail($id);
        $pageTitle = 'Edit Infaq';
        return view('admin.keuangan.edit', compact('infaq', 'pageTitle'));
    }

    public function destroy($id)
    {
        $infaq = Infaq::findOrFail($id);
        $infaq->delete();
        return redirect()->route('admin.keuangan.list')->with('success', 'Data infaq berhasil dihapus.');
    }
}
