<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artikel, App\HubungiKami, App\Masjid;
class HomePageController extends Controller
{
    public function index()
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
        ->where('publikasi', 'utama')->select($arrResponse)->first();

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

    }

    public function artikelIndex()
    {
        $articles = Artikel::orderBy('created_at', 'desc')->paginate(5);
        return view('public.artikel.index', compact('articles'));
    }

    public function artikelDetail($id)
    {

    }

    public function masjidIndex()
    {
        $masjids = Masjid::orderBy('created_at', 'desc')->paginate(4);
        return view('public.masjid.index', compact('masjids'));
    }

    public function masjidDetail($id)
    {

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
}
