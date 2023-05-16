<?php

namespace App\Http\Controllers;

use App\Models\LupaPasswordModel;
use Illuminate\Http\Request;

class LupaPasswordController extends Controller
{
    public function index()
{
    $data = LupaPasswordModel::all();

    return response()->json([
        'data' => $data,
    ]);
}
   public function store()
   {
    $fields = [
        'nip',
        'email',
        'password_baru'

    ];
    $data = new LupaPasswordModel();
    foreach($fields as $f){
        $data->$f = \request($f);
    }
    $data->nip_id = request()->user()->id;
    return response()->json([
        'data' => $data,
    ], $data->saveOrFail()?200:406);
   }

   public function update(LupaPasswordModel $l)
   {
    
    $l->nip = request('nip');
    $l->email = request('email');
    $l->password_baru = request('password_baru');
    $r = $l->save();
    return response()->json([
        'data' => $l
    ],$r == true ? 200:406);

   }
   public function delete(LupaPasswordModel $l)
   {
    return response()->json([
        'data' => $l->delete()
    ]);
   }
   public function show(LupaPasswordModel $l)
   {
    return response()->json([
        'data' => $l
    ]);
   }
}
