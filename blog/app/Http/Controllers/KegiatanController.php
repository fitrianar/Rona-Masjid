<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;

class KegiatanController extends Controller
{

    public function __construct()
    {
       
    }
    public function index()
    {
        $kegiatan = Kegiatan::paginate(5);
        return view('cms.kegiatan.index', compact('kegiatan'));
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
        return view('cms.kegiatan.create');
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
            'tgl_dilaksanakan' => 'required',
            'jam_dimulai' => 'required',
            'jam_akhir' => 'required',
            'deskripsi_kegiatan' => 'required|string|max:255'
        ]);

        $gambar = null;
        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $gambar = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }  
        
        $request['poster'] = $gambar;
        $request['tgl_dibuat'] = now();
        $request['user_id'] = auth()->user()->id;
        $request['masjid_id'] = auth()->user()->masjid()->id;
        Kegiatan::Create($request->all());  //ini cara cepat buat insert ke db semua formnya
       

        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('kegiatan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::find($id);
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

        $kegiatan = Kegiatan::where('id', $id)->first();
        return view('cms.kegiatan.edit', compact('kegiatan'));
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
            'tgl_dilaksanakan' => 'required',
            'jam_dimulai' => 'required',
            'jam_akhir' => 'required',
            'deskripsi_kegiatan' => 'required|string|max:255'
        ]);

        $gambar = $request->file('poster');

        if($gambar){
            $name = $gambar->getClientOriginalName();
            $dist = 'uploads/';
            $nameExp = explode('.', $name);
            $nameActExp = strtolower(end($nameExp));
            $newName = uniqid( '', true).'.'.$nameActExp;
            $upload = $gambar->move($dist, $newName);
            $request['poster'] = $dist.$newName;

            Kegiatan::where('id', $id)->update($request->except('_token'));
        }else{
            Kegiatan::where('id', $id)->update($request->except('_token'));
        }

       // DB::table('artikel')->insert($request->All); //query builder

       $request->session()->flash('alert-success', 'Sukses Mengubah Data');
        return redirect()->route('kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kegiatan = Kegiatan::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Sukses Menghapus Data');
        return redirect()->route('kegiatan.index');
        //return redirect('/home')->with('Success', 'Article has been delete');
    }
}
