<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Transaksi;
use Midtrans\Snap;
use Midtrans\Config;

class DonasiController extends Controller
{
    /**
     * Tampilkan semua donasi
     */
    public function index()
    {
        $pageTitle = 'Donasi';
        $donasis = Donasi::all();
        return view('pages.donasi', compact('pageTitle', 'donasis'));
    }

    /**
     * Tampilkan detail 1 donasi + progress real
     */
    public function view($id)
    {
        $pageTitle = 'Detail Donasi';
        $donasi = Donasi::findOrFail($id);

        // Total donasi yang sudah settlement (dibayar)
        $terkumpul = Transaksi::where('donasi_id', $donasi->id)
            ->where('status', 'settlement')
            ->sum('nominal');

        // Hitung progress %
        $target = $donasi->unlimited_target ? null : $donasi->target;
        $progress = $target && $target > 0 ? min(100, ($terkumpul / $target) * 100) : 100;

        return view('pages.viewDonasi', compact('pageTitle', 'donasi', 'terkumpul', 'target', 'progress'));
    }

    /**
     * Buat transaksi baru & redirect ke Snap
     */
    public function bayar(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nominal' => 'required|numeric|min:10000',
            'email' => 'required|email',
            'donasi_id' => 'required|exists:donasi,id'
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = uniqid('DON-');

        $transaksi = Transaksi::create([
            'donasi_id' => $request->donasi_id,
            'order_id' => $orderId,
            'nama' => $request->nama,
            'email' => $request->email,
            'nominal' => $request->nominal,
            'status' => 'pending'
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->nominal,
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'email' => $request->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('pages.snap', [
            'pageTitle' => 'Bayar Donasi',
            'snapToken' => $snapToken
        ]);
    }
}
