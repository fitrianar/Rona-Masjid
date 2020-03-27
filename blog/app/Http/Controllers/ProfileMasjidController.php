<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masjid;
use App\User;
use File;

class ProfileMasjidController extends Controller
{
    public function index()
    {
        $user = User::masjid();

        if($user != 'Admin'){
            $masjid = Masjid::where('id', $user->id)->first();
            return view('cms.profile-masjid.index', compact('masjid'));
        }else{
            abort(403); //jika masjid tidak ditemukan
        }
    }

    public function edit($id)
    {
        $profile = Masjid::where('id', $id)->first();
        return view('cms.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_masjid'   => 'required|string|max:64',
            'file'        => 'nullable|file|max:2048',
            'alamat_masjid' => 'required|string|max:255',
            'l_tanah'       => 'required|string|max:64',
            'p_tanah'       => 'required|string|max:64',
            'luas_bangunan' => 'required|string|max:64',
            'lampiran'    => 'nullable|file|max:2048',
            'status_masjid' => 'required|string|max:255',
            'deskripsi'     => 'required|string|max:255'
        ]); 

        $masjid = Masjid::where('id', $id)->first();

        if($masjid){
            if($request->file('lampiran')){
                $dir = 'lampiran/';
                $image = $request->file('lampiran');
                $request['lampiran_masjid'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
                
                File::delete(public_path($masjid->lampiran_masjid));
    
                Masjid::where('id', $id)->update($request->only('lampiran_masjid'));
            }
    
            if($request->file('file')){
               $dir = 'uploads/';
                $size = '480';
                $format = '';
                $image = $request->file('file'); 
                $request['gambar'] = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
                File::delete(public_path($masjid->gambar));
                Masjid::where('id', $id)->update($request->only('gambar'));
            }
    
            Masjid::where('id', $id)->update($request->only('nama_masjid', 'alamat_masjid', 'l_tanah', 'p_tanah', 'luas_bangunan', 'status_masjid', 'deskripsi'));
    
            $request->session()->flash('alert-success', 'Sukses Mengubah Data');
            return redirect()->route('profile-masjid.index'); 
        }

              
    }
}