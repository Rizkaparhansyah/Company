<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Campign;
use App\Models\Transaksi;


class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = "SB-Mid-server-2nJfFEgvKuFWIzDFQ9Q7cfEh";
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        return view('donate');
    }

    public function pay(Request $request)
{
    // return $request->all();
    $orderId = time();

    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => (int) $request->nominal,
        ],
        'customer_details' => [
            'first_name' => $request->nama_donatur,
        ]
    ];

    $snapToken = Snap::getSnapToken($params);

    // Simpan transaksi ke database
    // Campign::where('id', $request->id)->update(['terkumpul' => $request->terkumpul]);
    Transaksi::create([
        'order_id' => $orderId,
        'nik' => $request->nik,
        'tipe_zakat' => $request->tipe_zakat,
        'nominal' => $request->nominal,
        'nama_donatur' => $request->nama_donatur,
        'id_campign' => $request->id ?? null,
        'status' => 'pending',
    ]);

    return response()->json(['token' => $snapToken]);
}

    public function notificationHandler(Request $request)
    {
        // return $request->all();

        $transaction = Transaksi::where('order_id', $request->order_id)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->status = $request->transaction_status;
        // $transaction->payment_type = $notif->payment_type;
        $transaction->save();

        return response()->json(['message' => 'Notification handled']);
    }

}
