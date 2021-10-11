<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with('transaction');

        $revenue = $transactions->whereBetween('shipping_status', ['PAID' , 'SUCCESS'])->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });

        $user = User::count();
        $transaction = Transaction::count();
        return view('pages.admin.dashboard', [
            'user' => $user,
            'revenue' => $revenue,
            'transaction' => $transaction,
        ]); 
    }
}
