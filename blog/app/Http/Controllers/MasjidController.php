<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masjid;
use Session;

class MasjidController extends Controller
{
    public function index()
    {
        $masjid = Masjid::paginate(5);
        return view('cms.masjid.index', compact('masjid'));
    }

    public function create()
    {
        return view('cms.masjid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_masjid'   => 'required|string|max:64',
            'gambar'        => 'required|file|max:2048',
            'alamat_masjid' => 'required|string|max:255',
            'l_tanah'       => 'required|string|max:10',
            'p_tanah'       => 'required|string|max:10',
            'luas_bangunan' => 'required|string|max:64',
            'lampiran_masjid'    => 'nullable|file|max:2048',
            'status_masjid' => 'required|string|max:255',
            'deskripsi'     => 'required|string|max:255'
        ]);

        $gambar = null;
        if ($request->file('gambar')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('gambar');

            $gambar = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }          
        $request['gambar'] = $gambar;

        $lampiran = null;
        if ($request->file('lampiran_masjid')) {
            
            $dir = 'uploads/';
            $fileName = $request->nama_masjid;          
            $data = $request->file('lampiran_masjid');

            $lampiran = \App\Helper\ImageUpload::pushFile($dir, $fileName, $data);                
        }          
        $request['lampiran_masjid'] = $lampiran;
       
        Masjid::Create($request->All());
        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('masjid.index');
    }

    public function edit($id)
    {
        $masjid = Masjid::where('id', $id)->first();
        return view('cms.masjid.edit', compact('masjid'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_masjid'   => 'required|string|max:64',
            'gambar'        => 'nullable|file|max:2048',
            'alamat_masjid' => 'required|string|max:255',
            'l_tanah'       => 'required|string|max:64',
            'p_tanah'       => 'required|string|max:64',
            'luas_bangunan' => 'required|string|max:64',
            'lampiran_masjid'    => 'nullable|file|max:2048',
            'status_masjid' => 'required|string|max:255',
            'deskripsi'     => 'required|string|max:255'
        ]);

        Masjid::where('id', $id)->update($request->except('_token'));
        $request->session()->flash('alert-success', 'Sukses Mengubah Data');
        return redirect()->route('masjid.index');

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
