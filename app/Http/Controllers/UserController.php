<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $data = UserModel::all();

    return response()->json([
        'data' => $data,
    ]);
}
   public function store()
   {
    $fields = [
        'nip',
        'nama_lengkap',
        'jenis_kelamin',
        'jabatan',
        'alamat',
        'no_hp',
        'email'

    ];
    $data = new UserModel();
    foreach($fields as $f){
        $data->$f = \request($f);
    }
    $data->nip_id = request()->user()->id;
    return response()->json([
        'data' => $data,
    ], $data->saveOrFail()?200:406);
   }

   public function update(UserModel $w)
   {
    
    $w->nip = request('nip');
    $w->nama_lengkap = request('nama_lengkap');
    $w->jenis_kelamin = request('jenis_kelamin');
    $w->jabatan = request('jabatan');
    $w->alamat = request('alamat');
    $w->no_hp = request('no_hp');
    $r = $w->save();
    return response()->json([
        'data' => $w
    ],$r == true ? 200:406);

   }
   public function delete(UserModel $w)
   {
    return response()->json([
        'data' => $w->delete()
    ]);
   }
   public function show(UserModel $w)
   {
    return response()->json([
        'data' => $w
    ]);
   }
}
