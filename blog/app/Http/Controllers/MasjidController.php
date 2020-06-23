<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masjid;
use Session;
use File;

class MasjidController extends Controller
{
   
    public function index()
    {
        $roleId =  auth()->user()->role()->id;

        if($roleId == 1){
            $masjid = Masjid::orderby('created_at','desc')->paginate(5);
            return view('cms.masjid.index', compact('masjid'));
        }

        return abort(403);
    }

    public function create()
    {
        $roleId =  auth()->user()->role()->id;

        if($roleId == 1){
            return view('cms.masjid.create');
        }

        return abort(403);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_masjid'   => 'required|string|max:64',
            'file'        => 'required|file|max:2048',
            'alamat_masjid' => 'required|string|max:255',
            'l_tanah'       => 'required|string|max:10',
            // 'p_tanah'       => 'required|string|max:10',
            'luas_bangunan' => 'required|string|max:64',
            'file_lampiran'    => 'nullable|file|max:2048',
            'status_masjid' => 'required|string|max:255',
            'deskripsi'     => 'required|string|max:255'
        ]);

        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $request['gambar'] = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }          

        if ($request->file('file_lampiran')) {
            
            $dir = 'lampiran/';
            $image = $request->file('file_lampiran');
            $request['lampiran_masjid'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
        }          
       
        Masjid::Create($request->except('file', 'file_lampiran'));
        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('masjid.index');
    }

    public function edit($id)
    {
        $masjid =  Masjid::where('id', $id)->first();
        $roleId =  auth()->user()->role()->id;

        if($masjid){
            if($roleId == 1){
                return view('cms.masjid.edit', compact('masjid')); 
            }
        }
        abort(403);
     
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_masjid'   => 'required|string|max:64',
            'file'        => 'nullable|file|max:2048',
            'alamat_masjid' => 'required|string|max:255',
            'l_tanah'       => 'required|string|max:64',
            // 'p_tanah'       => 'required|string|max:64',
            'luas_bangunan' => 'required|string|max:64',
            'file_lampiran'    => 'nullable|file|max:2048',
            'status_masjid' => 'required|string|max:255',
            'deskripsi'     => 'required|string|max:255'
        ]);

        $masjid = Masjid::where('id', $id)->first();

        if($masjid){
            if ($request->file('file')) {
            
                $dir = 'uploads/';
                $size = '480';
                $format = '';
                $image = $request->file('file');
    
                $request['gambar'] = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
               
                File::delete(public_path($masjid->gambar));
                Masjid::where('id', $id)->update($request->only('gambar'));
            }

            if($request->file('file_lampiran')){
                $dir = 'lampiran/';
                $image = $request->file('file_lampiran');
                $request['lampiran_masjid'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
                
                File::delete(public_path($masjid->lampiran_masjid));
    
                Masjid::where('id', $id)->update($request->only('lampiran_masjid'));
            }

            Masjid::where('id', $id)->update($request->except('_token', 'file'));
            $request->session()->flash('alert-success', 'Sukses Mengubah Data');
            return redirect()->route('masjid.index');
        }

        abort(403);

    }

    public function destroy(Request $request, $id)
    {
        $masjid = Masjid::where('id', $id)->first();

        if($masjid){
            $masjid->delete();
            $request->session()->flash('alert-success', 'Sukses Menghapus Data');
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
