<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $signatureKey = hash('sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($signatureKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transaksi = Transaksi::where('order_id', $request->order_id)->first();

        if (!$transaksi) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $transaksi->status = 'settlement';
        } elseif ($request->transaction_status == 'pending') {
            $transaksi->status = 'pending';
        } elseif (in_array($request->transaction_status, ['deny', 'expire', 'cancel'])) {
            $transaksi->status = 'failed';
        }

        $transaksi->save();

        return response()->json(['message' => 'OK']);
    }
}
