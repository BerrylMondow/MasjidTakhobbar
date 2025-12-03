<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Transaksi;
use App\Models\Infaq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $pageTitle = 'Admin Login';
        return view('admin.login', compact('pageTitle'));
    }

    public function login(Request $request)
{
    $username = $request->input('username');
    $password = $request->input('password');

    $admin = Admin::where('username', $username)->first();

    if ($admin && Hash::check($password, $admin->password)) {
        session(['is_admin' => true]);
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['login' => 'Username atau password salah']);
}

    public function dashboard()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        $pageTitle = 'Dashboard Admin';
        return view('admin.dashboard', compact('pageTitle'));
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('admin.login');
    }

    public function berita()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        $pageTitle = 'Manajemen Berita';
        $newss = Berita::latest()->get();
        return view('admin.news.list', compact('pageTitle', 'newss'));
    }

    public function create()
    {
        $pageTitle = 'Buat Berita';
        return view('admin.news.add', compact('pageTitle'));
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'gambar_caption' => 'nullable|string|max:255',
        'keyword' => 'required|string|max:255',
    ]);

    if (!$request->hasFile('gambar') || !$request->file('gambar')->isValid()) {
        return back()->withErrors(['gambar' => 'Gagal mengunggah gambar.']);
    }

    $file = $request->file('gambar');
    $ext = strtolower($file->getClientOriginalExtension());
    $fileName = time() . '.' . $ext;
    $file->storeAs('berita', $fileName, 'public');

    Berita::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal,
        'gambar' => $fileName,
        'gambar_caption' => $request->gambar_caption,
        'keyword' => $request->keyword,
    ]);

    return redirect()->route('admin.news.list')->with('success', 'Berita berhasil disimpan!');
}


    public function edit($id)
    {
        $news = Berita::findOrFail($id);
        $pageTitle = 'Edit Berita';
        return view('admin.news.edit', compact('news', 'pageTitle'));
    }

    public function update(Request $request, $id)
    {
        $news = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'keyword' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_caption' => 'nullable|string|max:255',
        ]);

        $news->judul = $request->judul;
        $news->deskripsi = $request->deskripsi;
        $news->tanggal = $request->tanggal;
        $news->keyword = $request->keyword;
        $news->gambar_caption = $request->gambar_caption;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            Storage::disk('public')->delete('berita/' . $news->gambar);

            // Upload gambar baru
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->file('gambar')->storeAs('berita', $gambarName, 'public');

            $news->gambar = $gambarName;
        }

        $news->save();

        return redirect()->route('admin.news.list')->with('success', 'Berita berhasil diupdate!');
    }

   public function destroy($id)
{
    $news = Berita::findOrFail($id);
    $news->delete();

    return redirect()->route('admin.news.list')->with('success', 'Berita berhasil dihapus.');
}

public function dashboardBerita()
    {
    if (!session('is_admin')) {
        return redirect()->route('admin.login');
    }

    // Total berita yang sudah publish
    $totalBerita = \App\Models\Berita::count();

    // Total donasi 
    $totalDonasi = \App\Models\Transaksi::where('status', 'Success')->sum('nominal');
    $jumlahDonasi = \App\Models\Transaksi::where('status', 'Success')->count();

    // 🔥 Total infaq & sedekah
    $totalInfaq = Infaq::sum('nominal');

    $pageTitle = 'Dashboard Admin';
    return view('admin.dashboard', compact(
        'pageTitle',
        'totalBerita',
        'totalDonasi',
        'jumlahDonasi',
        'totalInfaq'
    ));
}


}
