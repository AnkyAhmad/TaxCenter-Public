<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;

use Kavist\RajaOngkir\Facades\RajaOngkir;


class LocationController extends Controller
{
    public function provinces(Request $request)
    {
        return Province::all();
    }

    public function cities(Request $request, $provinces_id)
    {
        return Regency::where('provinces_id', $provinces_id)->get();
        
    }
    public function RajaOngkirProvinsi()
    {
        $daftarProvinsi = RajaOngkir::kota()->all();

        dd($daftarProvinsi);
    }
}
