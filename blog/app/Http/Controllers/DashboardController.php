<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan, App\Artikel, App\User, App\Masjid, App\Berlangganan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $roleId = auth()->user()->role()->id; //get role id

        if($roleId == 1){ //role admin
            $jmlArtikel = Artikel::count();
            $jmlPengurus = User::where('role_akses_id', '3')->count();
            $jmlMember  = Berlangganan::count();
            $jmlMasjid  = Masjid::count();

            return view('cms.dashboard.index-admin', compact('jmlArtikel','jmlPengurus', 'jmlMember', 'jmlMasjid'));

        }else if($roleId == 3){ //role pengurus
            $masjidId = auth()->user()->masjid()->id;
            $kegiatan = Kegiatan::where('masjid_id', $masjidId)->limit(4)->get();
            $jmlArtikel = Artikel::where('masjid_id', $masjidId)->count();
            $jmlKegiatan = Kegiatan::where('masjid_id', $masjidId)->count();

            return view('cms.dashboard.index', compact('kegiatan', 'jmlArtikel', 'jmlKegiatan'));
        }
    }
}
