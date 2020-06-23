<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artikel, App\HubungiKami, App\Masjid;
class HomePageController extends Controller
{
    public function index(Request $request)
    {

        $arrResponse = [
            'artikel.id',
            'artikel.judul',
            'artikel.isi',
            'artikel.gambar',
            'artikel.created_at',
            'users.nama',
            'masjid.nama_masjid',
            'users.gambar as user_gambar'
        ];
        //$artikelUtama = Artikel::where('publikasi', 'utama')->first();
        $artikelUtama = DB::table('artikel')->join('users', 'artikel.user_id', 'users.id')
        ->join('masjid', 'artikel.masjid_id', 'masjid.id')
        ->where('publikasi', '1')->select($arrResponse)->first();

        if(is_null($artikelUtama)){
            $artikelUtama = DB::table('artikel')->join('users', 'artikel.user_id', 'users.id')
            ->join('masjid', 'artikel.masjid_id', 'masjid.id')
            ->orderBy('created_at', 'desc')->select($arrResponse)->first();    
        }
        
        $kategori = DB::table('kategori_has_artikel')->join('kategori', 'kategori_has_artikel.kategori_id', 'kategori.id')
        ->where('kategori_has_artikel.artikel_id', $artikelUtama->id)
        ->get();

        //return response()->json( $kategori);
        return view('public.index', compact('artikelUtama', 'kategori'));
    }

    public function kegiatanIndex()
    {
        $arrResponse = [
            'kegiatan.id',
            'kegiatan.nama',
            'kegiatan.tgl_dilaksanakan',
            'kegiatan.jam_dimulai',
            'kegiatan.jam_akhir',
            'kegiatan.deskripsi_kegiatan',
            'kegiatan.created_at',
            'kegiatan.poster',
            'users.nama as user_nama',
            'masjid.nama_masjid',

        ];

        $kegiatan = DB::table('kegiatan')->join('users', 'kegiatan.user_id', 'users.id')
                        ->join('masjid', 'kegiatan.masjid_id', 'masjid.id')
                        ->orderBy('kegiatan.tgl_dilaksanakan', 'desc')
                        ->select($arrResponse)
                        ->paginate(5);             

        return view('public.kegiatan.index', compact('kegiatan'));

    }

    public function kegiatanDetail($id)
    {
        $arrResponse = [
            'kegiatan.id',
            'kegiatan.nama as judul',
            'kegiatan.tgl_dilaksanakan',
            'kegiatan.jam_dimulai',
            'kegiatan.jam_akhir',
            'kegiatan.deskripsi_kegiatan',
            'kegiatan.poster',
            'kegiatan.created_at',
            'kegiatan.tgl_dibuat',
            'users.nama',
            'masjid.nama_masjid',
            'users.gambar as user_gambar'
        ];
        $kegiatan = DB::table('kegiatan')->join('users', 'kegiatan.user_id', 'users.id')
        ->join('masjid', 'kegiatan.masjid_id', 'masjid.id')
        ->where('kegiatan.id', $id)->select($arrResponse)->first();
   
        if($kegiatan){ 

            return view('public.kegiatan.detail', compact('kegiatan'));
        }

        abort(403); //if kegiatan tidak ada
    }

    public function artikelIndex(Request $request)
    {
       // return $request->kategori;
        if($request->has('kategori')){
         $articles =  DB::table('kategori')->where('nama', $request->kategori)
            ->join('kategori_has_artikel', 'kategori.id', 'kategori_has_artikel.kategori_id')
            ->join('artikel', 'kategori_has_artikel.artikel_id', 'artikel.id')
            ->select('artikel.*')
            ->paginate(5);

            return view('public.artikel.index', compact('articles'));
        }
        $articles = Artikel::orderBy('created_at', 'desc')->paginate(5);
        return view('public.artikel.index', compact('articles'));
    }

    public function artikelDetail($id)
    {
        $arrResponse = [
            'artikel.id',
            'artikel.judul',
            'artikel.isi',
            'artikel.gambar',
            'artikel.created_at',
            'users.nama',
            'masjid.nama_masjid',
            'users.gambar as user_gambar'
        ];
        $artikel = DB::table('artikel')->join('users', 'artikel.user_id', 'users.id')
        ->join('masjid', 'artikel.masjid_id', 'masjid.id')
        ->where('artikel.id', $id)->select($arrResponse)->first();
   
        if($artikel){
            $kategori = DB::table('kategori_has_artikel')->join('kategori', 'kategori_has_artikel.kategori_id', 'kategori.id')
            ->where('kategori_has_artikel.artikel_id', $artikel->id)
            ->get(); 

            return view('public.artikel.detail', compact('artikel', 'kategori'));
        }

        abort(403); //if artikel tidak ada
    }


    public function masjidIndex()
    {
        $masjids = Masjid::orderBy('created_at', 'desc')->paginate(4);
        return view('public.masjid.index', compact('masjids'));
    }

    public function masjidDetail($id)
    {
   
        $masjid = Masjid::with('users')->with('kegiatan')->with('fasilitas')->where('id', $id)->first();

        // return $masjid;
        if($masjid){
            return view('public.masjid.detail', compact('masjid'));
        }

        abort(403); //if masjid tidak ada
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    public function storeKontak(Request $request)
    {
        $this->validate($request,[
            'name'  =>  'required|max:100',
            'email' =>  'required|email|max:100',
            'subjek'    =>  'nullable|max:200',
            'pesan'     =>  'nullable|max:1000'
        ]);

        HubungiKami::Create($request->except('_token'));

        return route('kontak');


    }

    public function tentangKami()
    {
        return view('public.tentang_kami');
    }
}
