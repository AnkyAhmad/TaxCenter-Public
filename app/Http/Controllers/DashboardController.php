<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Transaction as MidtransTransaction;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);
                            });

        $revenue = $transactions->whereBetween('shipping_status', ['PAID' , 'SUCCESS'])->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });

        $products = Product::where('users_id', Auth::user()->id)->count();

        return view('pages.dashboard', [
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'revenue' => $revenue,
            'products' => $products,
        ]);
    }
    
}