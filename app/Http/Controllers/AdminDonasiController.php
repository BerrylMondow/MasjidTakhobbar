<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminDonasiController extends Controller
{
    public function index()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        

        $donasi = Donasi::latest()->get();
        $pageTitle = 'Manajemen Donasi';
        return view('admin.donasi.list', compact('pageTitle', 'donasi'));
    }

    public function add()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        $pageTitle = 'Tambah Program Donasi Baru';
        return view('admin.donasi.add', compact('pageTitle'));
    }

    public function store(Request $request)
{
    $request->validate([
        'gambar' => 'required|image|max:5000',
        'nama_program' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'unlimited_target' => 'nullable|boolean',
        'target' => 'nullable|numeric|min:0',
        'deskripsi' => 'required',
        'tag' => 'nullable|string|max:255',
    ]);

    // Upload gambar
    $path = $request->file('gambar')->store('donasi', 'public');

    // Logic target
    $unlimited = $request->has('unlimited_target');
    $target = $unlimited ? null : $request->target;

    // Simpan
    Donasi::create([
        'gambar' => $path,
        'nama_program' => $request->nama_program,
        'tanggal' => $request->tanggal, // tidak perlu Carbon
        'unlimited_target' => $unlimited,
        'target' => $target,
        'deskripsi' => $request->deskripsi,
        'tag' => $request->tag,
    ]);

    return redirect()->route('admin.donasi.list')->with('success', 'Donasi berhasil ditambahkan.');
    }

     public function edit($id)
{
    $pageTitle = 'Edit Donasi';
    $donasi = Donasi::findOrFail($id);

    return view('admin.donasi.edit', compact('donasi', 'pageTitle'));
}


    public function update(Request $request, $id)
    {
        $donasi = Donasi::findOrFail($id);

        $validated = $request->validate([
            'gambar' => 'nullable|image|max:5000',
            'nama_program' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'target' => 'nullable|numeric',
            'deskripsi' => 'required|string',
            'tag' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($donasi->gambar) {
                Storage::disk('public')->delete($donasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('donasi', 'public');
        }

        $validated['unlimited_target'] = $request->has('unlimited_target') ? 1 : 0;

        $donasi->update($validated);

        return redirect()->route('admin.donasi.list')->with('success', 'Donasi berhasil diupdate!');
    }

    public function destroy($id)
    {
    $donasi = Donasi::findOrFail($id);
    Storage::delete('public/' . $donasi->gambar);
    $donasi->delete();
    return redirect()->route('admin.donasi.list')->with('success', 'Donasi berhasil dihapus.');
    }


}



