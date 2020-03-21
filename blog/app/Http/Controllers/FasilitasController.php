<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;

class FasilitasController extends Controller
{
    public function __construct()
    {
       
    }
    public function index()
    {
        $fasilitas = Fasilitas::paginate(5);
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
        ]);

        $gambar = null;
        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $gambar = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }  
        
        $request['foto'] = $gambar;
        $request['tgl_ditambah'] = now();
        $request['user_id'] = auth()->user()->id;
        $request['masjid_id'] = auth()->user()->masjid()->id;
        fasilitas::Create($request->all());  //ini cara cepat buat insert ke db semua formnya
       

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
        ]);

        $gambar = $request->file('foto');

        if($gambar){
            $name = $gambar->getClientOriginalName();
            $dist = 'uploads/';
            $nameExp = explode('.', $name);
            $nameActExp = strtolower(end($nameExp));
            $newName = uniqid( '', true).'.'.$nameActExp;
            $upload = $gambar->move($dist, $newName);
            $request['foto'] = $dist.$newName;

            Fasilitas::where('id', $id)->update($request->except('_token'));
        }else{
            Fasilitas::where('id', $id)->update($request->except('_token'));
        }

       // DB::table('artikel')->insert($request->All); //query builder

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
