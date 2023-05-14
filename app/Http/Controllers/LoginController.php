<?php

namespace App\Http\Controllers;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
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
        $id = request()->user()->nip;
        $p = LoginModel::query()->where('nip',$id)->first();

        if ($p != null) {
            $p->save();
            return response()->json(['nip'=>1]);
        }else {
            return response()->json([
                'pesan' => 'logout tidak berhasil, pengguna tidak tersedia'
            ],404);
        }
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
    
}
