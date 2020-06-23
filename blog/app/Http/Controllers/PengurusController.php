<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Masjid;
use Session;
class PengurusController extends Controller
{

    // public function __construct()
    // {
    //     $roleId = auth()->user()->role()->id;

    //     if($roleId != 3){
    //         abort(403);
    //     }
    // }

    public function index()
    {
        $pengguna = DB::table('users')
        ->join('masjid', 'users.masjid_id', 'masjid.id')
        ->select([
            'users.id as id',
            'users.nama as nama',
            'masjid.nama_masjid as nama_masjid',
            'users.no_ktp as no_ktp',
            'users.email as email',
            'users.no_telpon as no_telpon',
            'users.alamat as alamat',
            'users.jenis_kelamin as jenis_kelamin',
            'users.gambar as gambar',
            'users.email_verified as email_verified'
        ])
        ->orderby('users.created_at','desc')
        ->paginate(5);

        return view('cms.pengurus.index', compact('pengguna'));

    }

    public function create()
    {
        $masjid = Masjid::all();
        return view('cms.pengurus.create', compact('masjid'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'file'    => 'nullable|file|max:2048',
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
        $request['role_akses_id'] = '3'; //pengurus
        $request['password'] = bcrypt($request->email);
        $user = User::Create($request->all()); 

        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('pengurus.index');
    }

    public function edit($id)
    {

        $pengurus = DB::table('users')
        ->join('masjid', 'users.masjid_id', 'masjid.id')
        ->where('users.id', $id)
        ->select([
            'users.id as id',
            'users.nama as nama',
            'masjid.nama_masjid as nama_masjid',
            'masjid.id as masjid_id',
            'users.no_ktp as no_ktp',
            'users.email as email',
            'users.no_telpon as no_telpon',
            'users.alamat as alamat',
            'users.jenis_kelamin as jenis_kelamin',
            'users.email_verified as email_verified'
        ])
        ->first();

        $user = User::where('id', $id)->first();

        $masjid = Masjid::all();

        return view('cms.pengurus.edit', compact('pengurus', 'masjid', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'file'    => 'nullable|file|max:2048',
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
       
        User::Where('id', $id)->update($request->except('_token', 'file')); 

        $user = User::where('id', $id)->first();

        $request->session()->flash('alert-success', 'Sukses Mengubah Data');
        return redirect()->route('pengurus.index');
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $id)->delete();
 
        $request->session()->flash('alert-success', 'Sukses Menghapus Data');
        return redirect()->route('pengurus.index');
    }
}
