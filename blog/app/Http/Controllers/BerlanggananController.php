<?php

namespace App\Http\Controllers;
use App\Berlangganan;
use Illuminate\Http\Request;

class BerlanggananController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required|email|max:100|unique:berlangganan,email'
        ]);  
        Berlangganan::insert($request->only('email'));
    }
}
