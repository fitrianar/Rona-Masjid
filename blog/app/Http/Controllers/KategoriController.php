<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategori;

class KategoriController extends Controller
{
    public function fetch(Request $request)
    {
        $search = $request->get('search');
        
        $data = Kategori::where('nama', 'like',  '%'.$search.'%' )->orderBy('nama')->paginate(5);        
       return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    
    }

    public function fetchAll()
    {
        $results = DB::table('kategori')->select('id')->orderBy('id', 'ASC')->get();
        $arrResult = Array();

        foreach($results as $result){
            $arrResult[] = $result->id;
        }

        return $arrResult;
    }
}
