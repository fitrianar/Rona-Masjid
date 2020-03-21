<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Masjid;
use Session;

class MemberController extends Controller
{
    public function index()
    {
        $member = DB::table('users')->where('role_akses_id', 4)->paginate(5);

        return view('cms.member.index', compact('member'));

    }

    public function create()
    {
        return view('cms.member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'gambar'    => 'required|file|max:2048',
            'no_ktp'    => 'required|string|max:64',
            'no_telpon' => 'required|string|max:64',
            'alamat'    => 'required|string|max:255',
            'jenis_kelamin' =>  'required'
        ]);

        $gambar = null;
        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $gambar = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }          
        $request['gambar'] = $gambar;
        $request['email_verified'] = now();
        $request['role_akses_id'] = '4'; //member
        $request['password'] = bcrypt($request->email);
        $user = User::Create($request->all()); 

        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('member.index');
    }

    public function edit($id)
    {
        $member = User::where('id', $id)->first();
        return view('cms.member.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'gambar'    => 'nullable|file|max:2048',
            'no_ktp'    => 'required|string|max:64',
            'no_telpon' => 'required|string|max:64',
            'alamat'    => 'required|string|max:255',
            'jenis_kelamin' =>  'required'
        ]);

        $gambar = null;
        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $gambar = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
            $request['gambar'] = $gambar;
        }          
       
        User::Where('id', $id)->update($request->except('_token')); 

        $request->session()->flash('alert-success', 'Sukses Mengubah Data');
        return redirect()->route('member.index');
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Sukses Menghapus Data');
        return redirect()->route('pengurus.index');
    }
}
