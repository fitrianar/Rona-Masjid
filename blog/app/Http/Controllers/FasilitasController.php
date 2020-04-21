<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;
use File;

class FasilitasController extends Controller
{
    public function __construct()
    {
       
    }
    public function index()
    {
        $masjidId = auth()->user()->masjid()->id; 
        $fasilitas = Fasilitas::Where("masjid_id", $masjidId)->paginate(5);
        return view('cms.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function create(Request $request)
    {
        return view('cms.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:64',
            'jenis_fasilitas' => 'required|string|max:64',
            'file' => 'nullable|file|max:2048'
        ]); 

        if($request->file('file')){
            $dir = 'uploads/';
            $image = $request->file('file');
            $request['foto'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
        }

        $request['tgl_ditambah'] = now();
        $request['user_id'] = auth()->user()->id;
        $request['masjid_id'] = auth()->user()->masjid()->id;
        fasilitas::Create($request->except('file', '_token'));  //ini cara cepat buat insert ke db semua formnya
       

        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('fasilitas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $fasilitas = Fasilitas::where('id', $id)->first();
        return view('cms.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:64',
            'jenis_fasilitas'=> 'required|string|max:64',
            'file'      => 'nullable|file|max:2048'
        ]);

        $fasilitas = Fasilitas::where('id', $id)->first();
        if($fasilitas){
            if($request->file('file')){
                $dir = 'uploads/';
                $image = $request->file('file');
                $request['foto'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
                File::delete(public_path($fasilitas->foto));
                Fasilitas::where('id', $id)->update($request->except('_token', 'file'));
            }else{
                Fasilitas::where('id', $id)->update($request->except('_token', 'file'));
            }
        }
       $request->session()->flash('alert-success', 'Sukses Mengubah Data');
        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $fasilitas = Fasilitas::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Sukses Menghapus Data');
        return redirect()->route('fasilitas.index');
        //return redirect('/home')->with('Success', 'Article has been delete');
    }
}
