<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        return view('pages.dashboard-settings', [
            'user'=>$user,
        ]);
    }
    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboard-account', [
            'user'=>$user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        
        $data['slug_toko'] = mt_rand(00000,99999). '-' . Str::slug($request->store_name);

        $item->update($data);

        return redirect()->route($redirect);
    }
}
