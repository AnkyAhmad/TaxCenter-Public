<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

use Midtrans\Notification;

use Illuminate\Http\Request;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('product', function($product){
                             $product->where('users_id', Auth::user()->id);
                         })->whereBetween('shipping_status', ['PAID' , 'SUCCESS'])->get();
        
        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])  // salah models
                        ->whereHas('transaction', function($product){
                             $product->where('users_id', Auth::user()->id);
                         })->get();   

        return view('pages.dashboard-transactions', [
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions,
        ]);
    }
    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->findOrFail($id);

        $review = Review::with('product')->findOrFail($id);

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction,
            'review' => $review,
        ]);
    }

    public function update(Request $request, ReviewRequest $reviewRequest, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);
        $review = Review::findOrFail($id);

        $data['photo'] = $reviewRequest->file('photo')->store('assets/testi', 'public');

        $item->update($data);
        $review->update($data);

        return redirect()->route('dashboard-transactions-details', $id);
    }
}
