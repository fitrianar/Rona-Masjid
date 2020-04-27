<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DataTables;
use App\HubungiKami;

class HubungiKamiController extends Controller
{
    public function index()
    {
        return view('cms.hubungi-kami.index');
    }

    protected function datatables(Request $request)
    {
       $data = HubungiKami::all();
 
        return DataTables::of($data)  
        ->addIndexColumn()
        ->editColumn('name',
            function ($data){
                return $data->name;
        }) 
        ->editColumn('email',
            function ($data){
                return $data->email;
        }) 
        ->editColumn('subjek',
            function ($data){
                return $data->subjek;
        }) 
        ->editColumn('pesan',
            function ($data){
                if(strlen($data->pesan) > 500){
                    return  substr($data->pesan, 0, 500) . '...';
                }
                else{
                   return  $data->pesan;
                }
              
        }) 
       
        ->editColumn('action',
            function ($data){   
                return $data->email;                                             
            //         return '
            //         <a href="'.route('article.edit', $data['id']).'" class="btn btn-primary">Edit Data</a>
            //         <a href="'.route('article.delete', $data['id']) .'" class="btn btn-danger">Hapus</a>
            // ';
                   
            })        
       // ->rawColumns(['action', 'isi', 'kategori', ]) 
        ->addIndexColumn()
        ->make(true);  
    }
}
