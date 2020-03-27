<?php

namespace App\Http\Controllers\Autentikasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->back(); //dilempar balik ke halama dia sebelumnya
        }
        return view('autentikasi.login');
    }

    public function registrasi()
    {
        return view('autentikasi.registrasi');
    }

    public function loginMasuk(Request $request)
    {
    
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($check){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/login');
    }
}
