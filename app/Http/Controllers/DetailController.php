<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Review;
// use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();
        $stock = Product::where('stock', $id)->get();
        $review = Review::with(['product', 'user'])->where('products_id', $product->id)->get();
        $total_review = Review::with(['product', 'user'])->where('products_id', $product->id)
        ->whereNotNull('review')
        ->count();

        $total_rating = Review::with(['product', 'user'])->where('products_id', $product->id)->sum('stars');


        return view('pages.detail', [
            'product' => $product,
            'stock' => $stock,
            'review' => $review,
            'total_review' => $total_review,
            'total_rating' => $total_rating,
        ]);
    }

    public function add(Request $request, $id) 
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
