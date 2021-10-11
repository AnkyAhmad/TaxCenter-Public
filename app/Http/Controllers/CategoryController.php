<?php

namespace App\Http\Controllers;

use Request;

use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $categories = Category::all();

        if(Request::get('sort') == 'price_asc') {
            $products = Product::with('galleries', 'user')->whereHas('user', function($user){
                $user->where('store_status', '1');
            })->orderBy('price', 'ASC');
        }elseif(Request::get('sort') == 'price_desc'){
            $products = Product::with('galleries', 'user')->whereHas('user', function($user){
                $user->where('store_status', '1');
            })->orderBy('price', 'DESC');
        }else{
            $products = Product::with('galleries', 'user')->whereHas('user', function($user){
                $user->where('store_status', '1');
            })->orderByDesc('created_at');
        }

        return view('pages.category', [
            'categories'=>$categories,
            'products'=>$products->paginate(24),
        ]);
    }
    public function detail(Request $request, $slug)
    {
        
        $categories = Category::all();
        $category = Category::where('Slug', $slug)->firstOrFail();

        if(Request::get('sort') == 'price_asc') {
            $products = Product::with('galleries')->where('categories_id', $category->id)->orderBy('price', 'ASC');
        }elseif(Request::get('sort') == 'price_desc'){
            $products = Product::with('galleries')->where('categories_id', $category->id)->orderBy('price', 'DESC');
        }else{
            $products = Product::with('galleries')->where('categories_id', $category->id)->orderByDesc('created_at');
        }

        return view('pages.category', [
            'categories'=>$categories,
            'products'=>$products->paginate(24),
        ]);
    }

    
}
