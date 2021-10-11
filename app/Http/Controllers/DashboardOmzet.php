<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardOmzet extends Controller
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

        return view('pages.dashboard-omzet',[
            'revenue' => $revenue
        ]);
    }
}
