<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\Transaksi;
use Midtrans\Snap;
use Midtrans\Config;

class DonasiController extends Controller
{
    /* Tampilkan semua donasi */
public function index()
{
    $pageTitle = 'Donasi';

    $donasis = Donasi::withSum(['pembayaran as terkumpul' => function ($query) {
        $query->where('status', 'Success');
    }], 'nominal')
    ->orderBy('created_at', 'desc')
    ->get();

    return view('pages.donasi', compact('pageTitle', 'donasis'));
}


    /* Tampilkan detail 1 donasi + progress real */
    public function view($id)
    {
        $pageTitle = 'Detail Donasi';
        $donasi = Donasi::findOrFail($id);

        // Total donasi yang sudah settlement (dibayar)
        $terkumpul = Transaksi::where('donasi_id', $donasi->id)
            ->where('status', 'Success')
            ->sum('nominal');

        // Hitung progress %
        $target = $donasi->unlimited_target ? null : $donasi->target;
        $progress = $target && $target > 0 ? min(100, ($terkumpul / $target) * 100) : 100;

        return view('pages.viewDonasi', compact('pageTitle', 'donasi', 'terkumpul', 'target', 'progress'));
    }

    
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

    // Simpan transaksi di database
    $transaksi = Transaksi::create([
        'donasi_id' => $request->donasi_id,
        'order_id' => $orderId,
        'nama' => $request->nama,
        'email' => $request->email,
        'nominal' => $request->nominal,
        'status' => 'pending'
    ]);

    // Buat Snap Token
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

    // Return sebagai JSON agar AJAX bisa pakai
    return response()->json([
        'snapToken' => $snapToken
    ]);
}

public function callback(Request $request)
{
    \Log::info('Midtrans Callback:', $request->all());

    $serverKey = config('midtrans.server_key');

    $signatureKey = hash('sha512',
        $request->order_id .
        $request->status_code .
        $request->gross_amount .
        $serverKey
    );

    if ($signatureKey !== $request->signature_key) {
        \Log::error('Invalid signature', [
            'calculated' => $signatureKey,
            'received' => $request->signature_key
        ]);
        return response()->json(['message' => 'Invalid signature'], 403);
    }

    $transaksi = Transaksi::where('order_id', $request->order_id)->first();

    if (!$transaksi) {
        \Log::error('Transaction not found', ['order_id' => $request->order_id]);
        return response()->json(['message' => 'OK']);
    }

    switch ($request->transaction_status) {
        case 'capture':
        case 'settlement':
            $transaksi->status = 'Success';
            break;
        case 'pending':
            $transaksi->status = 'Pending';
            break;
        case 'deny':
        case 'expire':
        case 'cancel':
            $transaksi->status = 'Failed';
            break;
    }

    $transaksi->save();

    return response()->json(['message' => 'OK']);
}

}
