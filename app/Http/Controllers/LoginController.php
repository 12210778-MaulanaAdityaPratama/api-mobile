<?php

namespace App\Http\Controllers;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
{
    $data = LoginModel::all();

    return response()->json([
        'data' => $data,
    ]);
}
    public function login()
    {
        $nip = request()->header('nip');
        $password = request()->header('password');

        $hasil = LoginModel::query()
                    ->where('nip',$nip)->first();
        if ($hasil == null) {
            return response()->json([
                'pesan' => "Nip $nip pengguna tidak ada"
            ], 404);
        }elseif (Hash::check($password,$hasil->password)) {
            $hasil->save();
            return response()->json([
                'data' => $hasil
            ]);
        }else {
            return response()->json([
                'pesan' => 'nip dan kata sandi tidak cocok'
            ]);
        }
    }
    public function logout()
    {
        // $id = optional(Auth::user())->id;
        // // $id = request()->user()->id;
        // $p = LoginModel::query()->where('id',$id)->first();

        // if ($p != null) {
        //     auth()->logout();
        //     $p->save();
        //     return response()->json(['data'=>1]);
        // }else {
        //     return response()->json([
        //         'pesan' => 'logout tidak berhasil, pengguna tidak tersedia'
        //     ],404);
        // }
        auth()->logout();
        return response()->json(['data =>1']);
    }
    public function store()
   {
    $fields = [
        'nip',
        'password',
    ];
    $data = new LoginModel();
    foreach($fields as $f){
        $data->$f = \request($f);
    }
    // $data->id = request()->user()->id;
    return response()->json([
        'data' => $data,
    ], $data->saveOrFail()?200:406);
   }
    
    public function update()
    {
        $id = request()->user()->id;
        $p = LoginModel::query()->where('id',$id)->first();
        if ($p == null) {
            return response()->json([
                'pesan' => 'pengguna tidak ditemukan'
            ], 404);
        }
        $p->nip = request('nip');
        $r = $p->save();
        return response()->json([
            'data' =>$p
        ],$r == true ? 200 : 406);
    }
    public function delete(LoginModel $l)
   {
    return response()->json([
        'data' => $l->delete()
    ]);
   }
   public function show(LoginModel $l)
   {
    return response()->json([
        'data' => $l
    ]);
   }
    
}
