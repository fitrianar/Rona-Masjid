<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masjid;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Masjid::paginate(5);
        return view('cms.profile.index', compact('profile'));
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
        return redirect()->route('profile.index');

    }
}