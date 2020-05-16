<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use File;

class KegiatanController extends Controller
{
    protected $jam =[
        '00.00',
        '00.30',
        '01.00',
        '01.30',
        '02.00',
        '02.30',
        '03.00',
        '03.30',
        '04.00',
        '04.30',
        '05.00',
        '05.30',
        '06.00',
        '06.30',
        '07.00',
        '07.30',
        '08.00',
        '08.30',
        '09.00',
        '09.30',
        '10.00',
        '10.30',
        '11.00',
        '11.30',
        '12.00',
        '12.30',
        '13.00',
        '13.30',
        '14.00',
        '14.30',
        '15.00',
        '15.30',
        '16.00',
        '16.30',
        '17.00',
        '17.30',
        '18.00',
        '18.30',
        '19.00',
        '19.30',
        '20.00',
        '20.30',
        '21.00',
        '21.30',
        '22.00',
        '22.30',
        '23.00',
        '23.30'
    ];

    public function __construct()
    {
       
    }
    public function index()
    {
        $roleId = auth()->user()->role()->id;

        if($roleId == 3){ //pengurus
            $masjidId = auth()->user()->masjid()->id; 
            $kegiatan = Kegiatan::where('masjid_id', $masjidId)->orderBy('created_at', 'desc')->paginate(5);
        }else{
            $kegiatan = Kegiatan::orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->paginate(5);
        }
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
        $roleId = auth()->user()->role()->id;
        if($roleId == 3){
            $jam = $this->jam;
            return view('cms.kegiatan.create', compact('jam'));
        }

        return abort(403);
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
            'nama' => 'required|string|max:150',
            'tgl_dilaksanakan' => 'required',
            'jam_dimulai' => 'required',
            'jam_akhir' => 'required',
            'deskripsi_kegiatan' => 'required|string|max:5000'
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
            'nama' => 'required|string|max:150',
            'tgl_dilaksanakan' => 'required',
            'jam_dimulai' => 'required',
            'jam_akhir' => 'required',
            'deskripsi_kegiatan' => 'required|string|max:5000'
        ]);

        $gambar = Kegiatan::where('id', $id)->first();
        if($gambar){
            if($request->file('file')){
                // $name = $gambar->getClientOriginalName();
                $dist = 'uploads/';
                // $nameExp = explode('.', $name);
                // $nameActExp = strtolower(end($nameExp));
                // $newName = uniqid( '', true).'.'.$nameActExp;
                // $upload = $gambar->move($dist, $newName);
                // $request['poster'] = $dist.$newName;
                $upload = $request->file('file');
                $request['poster'] = \App\Helper\ImageUpload::pushBerkas($dist, $upload);

                Kegiatan::where('id', $id)->update($request->except('_token', 'file'));
            }else{
                Kegiatan::where('id', $id)->update($request->except('_token', 'file'));
            }
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
