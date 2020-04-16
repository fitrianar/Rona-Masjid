<?php

namespace App\Http\Controllers\Autentikasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Session;
use App\User;

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
    
    public function storeRegistrasi(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'file'    => 'required|file|max:2048',
            'no_telpon' => 'required|string|max:64',
            'jenis_kelamin' =>  'required',
            'password'          => 'required|string|min:8|max:100',
            'password_confirm'  => 'required|string|max:100|same:password'
        ]);

        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $request['gambar'] = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }          
       // $request['email_verified'] = now();
        $request['no_ktp'] = '';
        $request['alamat'] = '';
        $request['masjid_id'] = '0';
        $request['status'] = 'menunggu' ;
        $request['role_akses_id'] = '4'; //member
        $request['password'] = bcrypt($request->password);
        $user = User::Create($request->except('file')); 

        $request->session()->flash('alert-success', 'Pendaftaran selesai, silahkan login terlebih dahulu');
        return redirect()->route('login');
    }

    public function loginMasuk(Request $request)
    {
    
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($check){
            return redirect()->route('dashboard');
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
