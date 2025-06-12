<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;

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

        if ($username === 'admin' && $password === 'dijsam2024') {
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
    $newss = Berita::latest()->get(); // Ambil semua berita dari tabel `news`
    return view('admin.news.list', compact('pageTitle', 'newss'));
}
}
