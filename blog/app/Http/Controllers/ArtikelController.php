<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel, App\Kategori;
use Illuminate\Support\Facades\DB;
use Session;
use DataTables;
use File;

class ArtikelController extends Controller
{
    protected $roleId;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $roleId = auth()->user()->role()->id;
        $articles = Array();
        if($roleId == 3){ //pengurus
            $masjidId = auth()->user()->masjid()->id; 

            $articles = DB::table('artikel')
            ->where('artikel.masjid_id', $masjidId)
            ->Join('kategori_has_artikel', 'artikel.id', 'kategori_has_artikel.artikel_id')
            ->Join('kategori', 'kategori_has_artikel.kategori_id', 'kategori.id')
            ->select([
                'artikel.id as id',
                'artikel.judul as judul',
                'artikel.gambar as gambar',
                'artikel.isi as isi',
                'kategori.nama as nama',
            ])
            ->orderBy('artikel.created_at', 'desc')
            ->get();
        }else{ //admin
            $articles = DB::table('artikel')->
            Join('kategori_has_artikel', 'artikel.id', 'kategori_has_artikel.artikel_id')
            ->Join('kategori', 'kategori_has_artikel.kategori_id', 'kategori.id')
            ->select([
                'artikel.id as id',
                'artikel.judul as judul',
                'artikel.gambar as gambar',
                'artikel.isi as isi',
                'kategori.nama as nama',
            ])
            ->orderBy('artikel.created_at', 'desc')
            ->get();
        }

       
        $arrData = Array();

        foreach($articles as $article)
        {
           //$arrData[$artice->id] =// 
            if(array_key_exists($article->id, $arrData)){
                $arrData[$article->id]['kategori'][] = $article->nama;
            }else{
                $arrData[$article->id] = [
                    'id'    =>  $article->id,
                    'judul' =>  $article->judul,
                    'gambar'=>  $article->gambar,
                    'isi'   =>  $article->isi
                ];
                $arrData[$article->id]['kategori'][] = $article->nama;
            }
        }


        return view('cms.article.index', compact('arrData'));
    }

    protected function datatables(Request $request)
    {
        $arrResponse =[
            'id',
            'name',
            'telephone',
            'mobile',
            'status'
        ];
        
        $roleId = auth()->user()->role()->id;
        $arrData = Array();
        if($roleId == 3){ //pengurus
            $masjidId = auth()->user()->masjid()->id; 

            $arrData = DB::table('artikel')
            ->where('artikel.masjid_id', $masjidId)
            ->Join('kategori_has_artikel', 'artikel.id', 'kategori_has_artikel.artikel_id')
            ->Join('kategori', 'kategori_has_artikel.kategori_id', 'kategori.id')
            ->select([
                'artikel.id as id',
                'artikel.judul as judul',
                'artikel.gambar as gambar',
                'artikel.isi as isi',
                'artikel.created_at as created_at',
                'kategori.nama as nama',
            ])
            ->orderBy('artikel.created_at', 'desc')
            ->get();
        }else{ //admin
            $arrData = DB::table('artikel')->
            Join('kategori_has_artikel', 'artikel.id', 'kategori_has_artikel.artikel_id')
            ->Join('kategori', 'kategori_has_artikel.kategori_id', 'kategori.id')
            ->select([
                'artikel.id as id',
                'artikel.judul as judul',
                'artikel.gambar as gambar',
                'artikel.isi as isi',
                'artikel.created_at as created_at',
                'kategori.nama as nama',
            ])
            ->orderBy('artikel.created_at', 'desc')
            ->get();
        }


        $data = Array();

        foreach($arrData as $article)
        {
           //$arrData[$artice->id] =// 
            if(array_key_exists($article->id, $data)){
                $data[$article->id]['kategori'][] = $article->nama;
            }else{
                $data[$article->id] = [
                    'id'    =>  $article->id,
                    'judul' =>  $article->judul,
                    'gambar'=>  $article->gambar,
                    'isi'   =>  $article->isi,
                    'created_at'   =>  $article->created_at
                ];
                $data[$article->id]['kategori'][] = $article->nama;
            }
            
        }
 
        return DataTables::of($data)  
        ->addIndexColumn()
        ->editColumn('judul',
            function ($data){
                return $data['judul'];
        }) 
        ->editColumn('created_at',
            function ($data){
                return $data['created_at'];
        }) 
        ->editColumn('gambar',
            function ($data){
                return '<td><img src="'.asset($data['gambar']).'" width="300px" height="300px"></td>';
        }) 
        ->editColumn('isi',
            function ($data){
                if(strlen($data['isi']) > 500){
          return  substr($data['isi'], 0, 500) . '...';
                }
                else{
                   return  $data['isi'];
                }
              
        }) 
        ->editColumn('kategori',
            function ($data){
                $result =null;
                foreach( $data['kategori'] as $kategori){
                    $result .= '<h6><span class="badge badge-secondary">'.$kategori.'</span></h6>';
                }
                return $result;
        }) 
        ->editColumn('action',
            function ($data){                                                
                    return '
                    <a href="'.route('article.edit', $data['id']).'" class="btn btn-primary">Edit Data</a>
                    <a href="'.route('article.delete', $data['id']) .'" class="btn btn-danger">Hapus</a>
            ';
                   
            })        
        ->rawColumns(['action', 'isi', 'kategori', 'gambar']) 
        ->addIndexColumn()
        ->make(true);  
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
        $roleId = auth()->user()->role()->id; //get role id

        if($roleId == 3){ //harus pengurus
            $kategori = Kategori::All();
            return view('cms.article.create', compact('kategori'));
        }else{
            abort(403);
        }
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
            'judul'     => 'required|string|max:150',
            'file'      => 'required|file|max:2048',
            'isi'       => 'required|string|max:3000'
        ]);

        $gambar = null;

        // asd
        if ($request->file('file')) {
            
            $dir = 'uploads/';
            $size = '480';
            $format = '';
            $image = $request->file('file');

            $gambar = \App\Helper\ImageUpload::pushStorage($dir, $size, $format, $image);                
        }  
        
        $request['gambar'] = $gambar;

        //asd

        // if($request->file('gambar')){
        //     $name = $gambar->getClientOriginalName();
        //     $dist = 'uploads/';
        //     $nameExp = explode('.', $name);
        //     $nameActExp = strtolower(end($nameExp));
        //     $newName = uniqid( '', true).'.'.$nameActExp;
        //     $upload = $gambar->move($dist, $newName);
        //     $request->gambar = $dist.$newName;
        // }
        $request['user_id'] = auth()->user()->id;
        $request['masjid_id'] = auth()->user()->masjid()->id;
        $artikel = Artikel::Create($request->except('_token', 'kategori'));  //ini cara cepat buat insert ke db semua formnya
       
        if($request->has('kategori')){
            foreach($request->kategori as $kat){
                $kategori = Kategori::where('id', $kat)->first();
              
                DB::table('kategori_has_artikel')->insert([
                    'artikel_id' => $artikel->id,
                    'kategori_id' => $kategori->id
                ]);
               
            }
        }

        
        $request->session()->flash('alert-success', 'Sukses Menambah Data');
        return redirect()->route('article.index');

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
        $article = Artikel::where('id', $id)->first();
        $kategori = Kategori::All();
        
        $kategories = DB::table('kategori_has_artikel')
        ->where('artikel_id', $id)->select('kategori_id')->get();
        
        $allKategoriId = null;
        foreach($kategories as $item){
            $allKategoriId .= $item->kategori_id.',';
        }
        $allKategoriId = rtrim($allKategoriId, ",");

        return view('cms.article.edit', compact('article', 'kategori', 'allKategoriId'));
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
            'judul'     => 'required|string|max:150',
            'file'      => 'nullable|file|max:2048',
            'isi'       => 'required|string|max:3000',
           
        ]);

        $artikel = Artikel::where('id', $id)->first();
        if($artikel){
            if($request->file('file')){
                $dir = 'uploads/';
                $image = $request->file('file');
                $request['gambar'] = \App\Helper\ImageUpload::pushBerkas($dir, $image);
                
                File::delete(public_path($artikel->gambar));

                Artikel::where('id', $id)->update($request->except('_token', 'kategori', 'file'));
            }else{
                Artikel::where('id', $id)->update($request->except('_token', 'kategori', 'file'));
            }
        }

        if($request->has('kategori')){
            DB::table('kategori_has_artikel')->where('artikel_id', $id)->delete();
           
            foreach($request->kategori as $ktgr){
                DB::table('kategori_has_artikel')->insert([
                    'kategori_id'   => $ktgr,
                    'artikel_id'    => $id, //parameter artikel
                ]);
            }
        }

       $request->session()->flash('alert-success', 'Sukses Mengubah Data');
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $artikel = Artikel::where('id', $id)->delete();
        DB::table('kategori_has_artikel')->where('artikel_id', $id)->delete();
        $request->session()->flash('alert-success', 'Sukses Menghapus Data');
        return redirect()->route('article.index')->with('Success', 'Article has been delete');
    }
}
