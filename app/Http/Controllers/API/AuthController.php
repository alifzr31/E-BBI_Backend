<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('username', 'password');

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'msg' => 'Username atau Password salah',
            ], 401);
        }

        $user = auth()->guard('api')->user();

        if ($user->role == 'siswa') {
            $usr = Siswa::where('id', $user->siswa_id)->with('user')->first();
        } else if ($user->role == 'guru') {
            $usr = Guru::where('id', $user->guru_id)->with('user')->first();
        } else {
            return response()->json([
                'success' => true,
                'user' => 'admin',
                'msg' => 'Mohon maaf untuk Admin silahkan log in via website',
                'token' => $token,
            ]);
        }

        return response()->json([
            'success' => true,
            'user' => $usr,
            'msg' => 'Selamat datang ' . $usr->nama,
            'token' => $token,
        ]);
    }

    public function logout()
    {
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if ($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Sampai jumpa lain waktu!',
            ]);
        }
    }
}
