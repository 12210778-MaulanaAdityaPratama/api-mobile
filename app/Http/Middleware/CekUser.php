<?php

namespace App\Http\Middleware;

use App\Models\UserModel;
use Closure;
use Illuminate\Http\Request;

class CekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userid = $request->header('userid');
        $user = UserModel::query()->where([
            'id' => $userid
            
        ])->first();
        if ($user == null) {
            return response()->json([
                'message' => 'pengguna belum login'
            ], 403);
        }
        $request->setUserResolver(function()use($user){
            return $user;
        });
        return $next($request);
    }
}
