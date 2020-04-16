<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('public.index');
    }

    public function kegiatanIndex()
    {

    }

    public function kegiatanDetail($id)
    {

    }

    public function artikelIndex()
    {
        return view('public.artikel.index');
    }

    public function artikelDetail($id)
    {

    }

    public function masjidIndex()
    {

    }

    public function masjidDetail($id)
    {

    }
}
