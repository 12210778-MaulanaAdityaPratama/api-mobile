<?php

namespace App\Http\Controllers;

use App\Models\IzinModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class IzinController extends Controller
{
    public function index()
    {
        $data = IzinModel::all();
    
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store()
       {
        $fields = [
            'tgl_mulai',
            'tgl_selesai',
            'keterangan',
            'file'
    ];
        $data = new IzinModel();
        foreach($fields as $f){
            $data->$f = \request($f);
        }
        // $data->id = request()->user()->id;
        return response()->json([
            'data' => $data,
        ], $data->saveOrFail()?200:406);
       }
       public function simpan_photo()
       {
        $id = request()->user()->id;
        $p = IzinModel::query()->where('id', $id)->first();

        if ($p == null) {
            return response()->json(['pesan' => 'Pengguna tidak terdaftar'], 404);
        }
        $b64foto = request('file_foto');

        if (strlen($b64foto)< 1023 ) {
            return response()-> json(['pesan' => 'file foto kurang ukurannya'], 406);
        }
        $foto = base64_decode($b64foto);
        $r = Storage::put("foto/$id.jpg", $foto);
        return response() -> json([
            'data' => $r
        ], $r == true ? 200 : 406);
       }
       public function photo()
       {
        $id = request()->user()->id;
        $file = "foto/$id.jpg";

        if (Storage::exists($file) == false) {
            return response()->json([
                'pesan' => 'not found'
            ], 404);
        }
        $foto = Storage::get("foto/$id.jpg");
        return response()->withHeaders([
            'Content-type' => 'image/jpeg'
        ])->setContent($foto) ->send();
       }
       public function update(IzinModel $i)
       {
        
        $i->tgl_mulai = request('tgl_mulai');
        $i->tgl_selesai = request('tgl_selesai');
        $i->keterangan = request('keterangan');
        $i->file = request('file');
        $r = $i->save();
        return response()->json([
            'data' => $i
        ],$r == true ? 200:406);
       }
       public function delete(IzinModel $i)
       {
        return response()->json([
            'data' => $i->delete()
        ]);
       }
       public function show(IzinModel $i)
       {
        return response()->json([
            'data' => $i
        ]);
       }
}
