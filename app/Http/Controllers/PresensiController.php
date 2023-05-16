<?php

namespace App\Http\Controllers;

use App\Models\PresensiModel;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $data = PresensiModel::all();
    
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store()
       {
        $fields = [
            'waktu_masuk',
            'waktu_tengah',
            'waktu_pulang',
            'alamat_ip',
            'lokasi',
        ];
        $data = new PresensiModel();
        foreach($fields as $f){
            $data->$f = \request($f);
        }
        // $data->id = request()->user()->id;
        return response()->json([
            'data' => $data,
        ], $data->saveOrFail()?200:406);
       }
       public function update(PresensiModel $pr)
       {
        
        $pr->waktu_masuk = request('waktu_masuk');
        $pr->waktu_tengah = request('waktu_tengah');
        $pr->waktu_pulang = request('waktu_pulang');
        $pr->alamat_ip = request('alamat_ip');
        $pr->lokasi = request('lokasi');
        $r = $pr->save();
        return response()->json([
            'data' => $pr
        ],$r == true ? 200:406);
       }
       public function delete(PresensiModel $pr)
       {
        return response()->json([
            'data' => $pr->delete()
        ]);
       }
       public function show(PresensiModel $pr)
       {
        return response()->json([
            'data' => $pr
        ]);
       }
}
