<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\Request;
use Request as RequestSort;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function index()
    {
        $banner = Banner::all();
        $categories = Category::all();

        $user = User::all();
        $products = Product::with('galleries', 'user')->whereHas('user', function($user){
            $user->where('store_status', '1');
        })->orderByDesc('created_at')->take(12)->get();

        

        return view('pages.home', [
            'categories'=>$categories,
            'products'=>$products,
            'banner'=>$banner
        ]);
    }

    public function search(Request $request){

        $query = $request->input('query');
        
        if(RequestSort::get('sort') == 'price_asc') {
            $products = Product::with('galleries', 'user')->whereHas('user', function($user){
                $user->where('store_status', '1');
            })->where('name','LIKE', "%$query%")->orderBy('price', 'ASC')->paginate(10);
        }elseif(RequestSort::get('sort') == 'price_desc'){
            $products = Product::with('galleries', 'user')->whereHas('user', function($user){
                $user->where('store_status', '1');
            })->where('name','LIKE', "%$query%")->orderBy('price', 'DESC')->paginate(10);
        }else{
            $products = Product::with('galleries', 'user')->whereHas('user', function($user){
                $user->where('store_status', '1');
            })->where('name','LIKE', "%$query%")->orderBy('created_at', 'DESC')->paginate(10);
        }
        

        return view('pages.search', [compact('products'), 'products'=>$products, 'query'=>$query]);
    }

    public function toko(Request $request, $slug_toko)
    {

        $user = User::where('slug_toko', $slug_toko)->firstOrFail();
        $products = Product::with(['galleries','user'])->where('users_id', $user->id)->orderByDesc('updated_at')->paginate(10);
        return view('pages.toko', [
            'products'=>$products,
            'user' =>$user,
        ]);
    }
    public function about()
    {
        return view('pages.about');
    }
}
