<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Kavist\RajaOngkir\Facades\RajaOngkir;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();

        
        $user = Auth::user();
        
        
        return view('pages.cart', [
            'carts' => $carts,
            'user' => $user,
        ]);

        
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function success()
    {
        return view('pages.success');
    }

    public $result, $nama_jasa;

    public function cekongkir(Request $request)
    {
        $user = Auth::user();

        $user->update($request->except('total_price'));

        $carts = Cart::with(['product','user'])->where('users_id', Auth::user()->id)->firstOrFail();
        
        $total_weight = Cart::with(['product','user'])->where('users_id', Auth::user()->id)->get()->reduce(function ($carry, $item){
            return $carry + $item->product->weight;
        });
        
        $total_price = Cart::with(['product','user'])->where('users_id', Auth::user()->id)->get()->reduce(function ($carry, $item){
            return $carry + $item->product->price;
        });

        $daftarProvinsi = RajaOngkir::provinsi()->all();
        
        $daftarKota = RajaOngkir::kota()->all();
        dd($daftarKota);
        // $daftarProvinsi = RajaOngkir::ongkosKirim([
        //     'origin'        => 155,     // ID kota/kabupaten asal
        //     'destination'   => 80,      // ID kota/kabupaten tujuan
        //     'weight'        => 1300,    // berat barang dalam gram
        //     'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        // ]);

        $cekongkir = RajaOngkir::ongkosKirim([
            'origin'        => $carts->product->user->regencies_id,     // ID kota/kabupaten asal
            'destination'   => $user->regencies_id,      // ID kota/kabupaten tujuan
            'weight'        => $total_weight,    // berat barang dalam gram
            'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        $nama_jasa = $cekongkir[0]['name'];
        
        foreach ($cekongkir[0]['costs'] as $row)
        {
            $result[] = array(
                'service' => $row['service'],
                'biaya' => $row['cost'][0]['value'],
                'etd' => $row['cost'][0]['etd'],
                'total' => $total_price + $row['cost'][0]['value']
            );
        }

        


        return view('pages.cekongkir', [
            'result' => $result,
            'nama_jasa' => $nama_jasa,
            'carts' => $carts,
            'total_price' => $total_price
            
        ]);
    }
}
