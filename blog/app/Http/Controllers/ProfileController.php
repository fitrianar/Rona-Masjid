<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $profile = User::where('id', $userId)->first();
        return view('cms.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:64',
            'no_ktp'    => 'nullable|string|max:2048',
            'email'     => 'required|string|max:255',
            'alamat'    => 'required|string',
            'jenis_kelamin'       => 'required|string|max:64',
            'file'      => 'nullable|file|max:2048',
        ]); 

        $profile = User::where('id', auth()->user()->id)->first();

        if($profile){
            if($request->file('file')){
                $dir = 'uploads/';
                $image = $request->file('file');
                $request['gambar'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
                
                File::delete(public_path($profile->gambar));
    
                User::where('id', $profile->id)->update($request->only('gambar'));
            }
    
            User::where('id', $profile->id)->update($request->except('_token', 'file'));
    
            $request->session()->flash('alert-success', 'Sukses Mengubah Data');
            return redirect()->route('profile-index'); 
        }
    }

    public function editPassword()
    {
        $profile = User::where('id', auth()->user()->id)->first();
        return view('cms.profile.edit-password', compact('profile'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|string|min:8|max:100',
            'password_confirm'  => 'required|string|max:100|same:password'
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        if($user){
            User::where('id', auth()->user()->id)->update([
                'password'  =>  bcrypt($request->password)
            ]);

            $request->session()->flash('alert-success', 'Sukses Mengubah Password');
            return redirect()->route('profile-edit-password'); 
        }
    }
}
