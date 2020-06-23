<?php

namespace App\Http\Controllers\Autentikasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Session;
use App\User;
use App\Masjid;

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
        $masjid = Masjid::all();
        return view('autentikasi.registrasi', compact('masjid'));
    }
    
    public function storeRegistrasiPengurus(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'file'      => 'required|file|max:2048|mimes:jpeg,bmp,png,jpg',
            'no_ktp'    => 'required|string|max:64',
            'email'     => 'required|email|max:64|unique:users,email',
            'no_telpon' => 'required|string|max:64|unique:users,no_telpon',
            'alamat'    => 'required|string|max:255',
            'jenis_kelamin'     =>  'required',
            'masjid_id'     =>  'required'
        ]);

        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $request['gambar'] = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }          
 
        $request['status'] = 'menunggu' ;
        $request['role_akses_id'] = '3'; //pengurus
        $request['password'] = bcrypt($request->email);
        $request['email_verified'] = null;
        $user = User::Create($request->except('file')); 

        User::verifiedEmail($user);

        $request->session()->flash('alert-success', 'Pendaftaran selesai, silahkan cek email anda untuk memverifikasi akun');
        return redirect()->route('login');
    }

    public function verifikasiAkun(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        if(is_null($user->email_verified)){
            User::where('id', $user->id)->update(['email_verified' => now()]);
            $request->session()->flash('alert-success', 'Akun Anda Terverifikasi');
            return redirect()->route('index');
        }else{
            $request->session()->flash('alert-danger', 'Akun Anda sudah Terverifikasi Sebelumnya');
            return redirect()->route('index');
        }
    }   

    public function loginMasuk(Request $request)
    {
    
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($check){
            return redirect()->route('dashboard');
        }else{
            $request->session()->flash('alert-warning', 'Password/email salah');
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
