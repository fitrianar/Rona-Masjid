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
       $data = HubungiKami::orderBy('created_at', 'desc')->get();
 
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
        ->editColumn('created_at',
            function ($data){
                return $data->created_at;
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
                if($data->status_pesan === 'Belum Dibalas'){
                    $status = 'btn-warning';
                }else{
                    $status = 'btn-success';
                }
                return '
                <a href="'.($data->status_pesan === 'Belum Dibalas' ? route('hubungi-kami-balas', $data->id) : '#').'" class=" btn btn-md '.$status.'">'.$data->status_pesan.'</a>
                ';
                   
            })        
       // ->rawColumns(['action', 'isi', 'kategori', ]) 
        ->addIndexColumn()
        ->make(true);  
    }

    public function balas($id)
    {
        $pesan = HubungiKami::where('id', $id)->first();
        if($pesan){
            return view('cms.hubungi-kami.edit', compact('pesan'));
        }
        abort(403);
    }

    public function postBalas(Request $request, $id)
    {
        $hubungiKami = HubungiKami::where('id', $id)->first();

        if($hubungiKami){
            HubungiKami::where('id', $id)->update(['status_pesan' => 'Sudah Dibalas']);
            $hubungiKami->balasan = '"'. $request->balasan. '"';
            HubungiKami::balasanHubungiKami($hubungiKami);
            $request->session()->flash('alert-success', 'Pesan Sukses Dibalas');
            return redirect()->route('hubungi-kami-index');
        }
        abort(403);

    }
}
