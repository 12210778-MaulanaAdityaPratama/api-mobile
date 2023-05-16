<?php

namespace App\Http\Controllers;

use App\Models\RiwayatModel;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
{
    $data = RiwayatModel::all();

    return response()->json([
        'data' => $data,
    ]);
}
public function store()
   {
    $fields = [
        'jmlh_hdir_tptwktu',
        'jmlh_tidak_hadir',
        'jmlh_telat'
    ];
    $data = new RiwayatModel();
    foreach($fields as $f){
        $data->$f = \request($f);
    }
    // $data->id = request()->user()->id;
    return response()->json([
        'data' => $data,
    ], $data->saveOrFail()?200:406);
   }
   public function update(RiwayatModel $rw)
   {
    
    $rw->jmlh_hdir_tptwktu = request('jmlh_hdir_tptwktu');
    $rw->jmlh_tidak_hadir = request('jmlh_tidak_hadir');
    $rw->jmlh_telat = request('jmlh_telat');
    $r = $rw->save();
    return response()->json([
        'data' => $rw
    ],$r == true ? 200:406);
   }
   public function delete(RiwayatModel $rw)
   {
    return response()->json([
        'data' => $rw->delete()
    ]);
   }
   public function show(RiwayatModel $rw)
   {
    return response()->json([
        'data' => $rw
    ]);
   }
}
