<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function process(Request $request) {
        // save user data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        //proses checkout
        $code = 'STORE-' . mt_rand(00000,99999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        //transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'inscurance_price' => 0,
            'shipping_price' => $request->ongkir,
            'total_price' => $request->total_price,
            'transaction_status' => 'Menunggu Pembayaran',
            'code' => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(00000,99999);

            $transactiondetail = TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'Menunggu Pembayaran',
                'resi' => '',
                'code' => $trx,
            ]);

            Review::create([
                'transaction_details_id' => $transactiondetail->id,
                'products_id' => $cart->product->id,
                'users_id' => Auth::user()->id,
            ]);
        }

        //Hapus data cart setelah checkout
        Cart::where('users_id', Auth::user()->id)->delete();

        

        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');


        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price
                
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
          $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
          return redirect($paymentUrl);
        }
        catch (Exception $e) {
          echo $e->getMessage();
        }
    }
    public function callback(Request $request) 
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //Instance notifikasi midtrans
        $notification = new Notification();

        //Assign variable
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        //cari transaksi berdasarkan ID
        $transaction = Transaction::where('code', $order_id)->firstOrFail();

        $transactiondetail = TransactionDetail::with('transaction')->where('transactions_id', $transaction->id);

        // dd($transactiondetail)

        // Handle notifikasi status
        if($status == 'capture') {
            if($type == 'credit_card') {
                if($fraud == 'challenge') {
                    $transaction->transaction_status = 'PENDING';
                }
                else {
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        } 

        else if ($status == 'settlement') {
            $transaction->transaction_status = 'SUCCESS';
            $transactiondetail->update(['shipping_status' => 'PROCESS']);
        }
        else if ($status == 'pending') {
            $transaction->transaction_status = 'PENDING';
        }
        else if ($status == 'deny') {
            $transaction->transaction_status = 'CANCELLED';
            $transactiondetail->update(['shipping_status' => 'CANCEL']);
        }
        else if ($status == 'expired') {
            $transaction->transaction_status = 'CANCELLED';
            $transactiondetail->update(['shipping_status' => 'CANCEL']);
        }
        else if ($status == 'cancel') {
            $transaction->transaction_status = 'CANCELLED';
            $transactiondetail->update(['shipping_status' => 'CANCEL']);
        }

        //simpan transaksi
        $transaction->save();

    }

}
