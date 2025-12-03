<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 use Carbon\Carbon;

class AdminDonasiController extends Controller
{

public function index(Request $request)
{
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    // Mulai query donasi
    $query = Donasi::query();

    // Jika ada parameter search
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where('nama_program', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
    }

    // Ambil hasil terbaru
    $donasi = $query->latest()->get();

    $pageTitle = 'Manajemen Donasi';
    return view('admin.donasi.list', compact('pageTitle', 'donasi'));
}


    public function show($id)
    {
        $donasi = Donasi::findOrFail($id);

        $terkumpul = $donasi->pembayaran()->where('status', 'Success')->sum('nominal');
        $donaturs = $donasi->pembayaran()->where('status', 'Success')->get();

        $donasi->terkumpul = $terkumpul;
        $pageTitle = 'Manajemen Donasi';
        return view('admin.donasi.view', compact('donasi', 'donaturs', 'pageTitle'));
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
            'target' => 'nullable|string',
            'deskripsi' => 'required',
            'tag' => 'nullable|string|max:255',
        ]);

        $path = $request->file('gambar')->store('donasi', 'public');

        $unlimited = $request->has('unlimited_target');
        $target = $unlimited ? null : str_replace('.', '', $request->target);

        Donasi::create([
            'gambar' => $path,
            'nama_program' => $request->nama_program,
            'tanggal' => $request->tanggal,
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
            'target' => 'nullable|string',
            'deskripsi' => 'required|string',
            'tag' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            if ($donasi->gambar) {
                Storage::disk('public')->delete($donasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('donasi', 'public');
        }

        $validated['unlimited_target'] = $request->has('unlimited_target') ? 1 : 0;

        if ($validated['unlimited_target']) {
            $validated['target'] = null;
        } else {
            $validated['target'] = str_replace('.', '', $request->target);
        }

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

   

public function dashboard()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        // Range bulan ini
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Total nominal donasi bulan ini (hanya status Success)
        $totalDonasi = Transaksi::where('status', 'Success')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('nominal');

        // Jumlah transaksi/donasi bulan ini
        $jumlahDonasi = Transaksi::where('status', 'Success')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        // Total berita (contoh yang sudah ada)
        $pageTitle = 'Dashboard Admin';
        $totalBerita = Berita::count();

        return view('admin.dashboard', compact(
            'pageTitle',
            'totalBerita',
            'totalDonasi',
            'jumlahDonasi'
        ));
    }
}
