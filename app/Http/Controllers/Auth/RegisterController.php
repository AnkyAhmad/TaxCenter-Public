<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
// use App\Models\Province;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

use Kavist\RajaOngkir\Facades\RajaOngkir;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public $provinsi_id;
    
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'store_name' => ['nullable', 'string', 'max:255'],
            'slug_toko' => ['nullable', 'string', 'max:255'],
            'npwp' => ['nullable', 'string', 'min:15', 'max:15', 'unique:users'],
            'provinces_id' => ['nullable', 'integer'],
            'regencies_id' => ['nullable', 'integer'],
            'is_store_open' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'store_name' => isset($data['store_name'])? $data['store_name'] : '',
            'slug_toko' => isset( $data['store_name'])? mt_rand(00000,99999). '-' . Str::slug($data['store_name']) : '',
            'provinces_id' => isset($data['provinces_id'])? $data['provinces_id'] : NULL,
            'regencies_id' => isset($data['regencies_id'])? $data['regencies_id'] : NULL,
            'npwp' => isset($data['npwp'])? $data['npwp'] : '',
            'store_status' => isset($data['is_store_open'])? 1 : 0,
        ]);
    }
    
    public function success() {
        return view('auth.verify');
    }
    public function check(Request $request) {
        return User::where('email', $request->email)->count() > 0 ? 'Unavailable' : 'Available';
    }
}
