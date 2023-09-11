<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\GuruMatpel;
use App\Models\Materi;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\TugasSiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // DASHBOARD MOBILE FEATURE START
    public function profile(Request $request)
    {
        $user = $request->user();

        if ($user->siswa_id != null) {
            $usr = Siswa::where('id', $user->siswa_id)->with('user')->with('kelas')->first();
            // $usr = Siswa::where('id', 1)->with(['kelas.gurumatpel.guru', 'kelas.gurumatpel.matpel'])->first();
        } else {
            $usr = Guru::where('id', $user->guru_id)->with('user')->first();
        }

        return response()->json([
            'success' => true,
            'msg' => 'Profile anda',
            'data' => $usr,
        ]);
    }

    public function listMatpel()
    {
        $user = Auth::user();
        $siswa = Siswa::where('id', $user->siswa_id)->first();
        if ($user->role == 'siswa') {
            $guruMatpel = GuruMatpel::where('kelas_id', $siswa->kelas->id)->with('matpel')->get();
        } else {
            $guruMatpel = GuruMatpel::where('guru_id', $user->guru_id)->with(['matpel', 'kelas'])->get();
        }


        return response()->json([
            'success' => true,
            'msg' => 'List Matpel Anda',
            'data' => $guruMatpel,
        ]);
    }

    public function editprofile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Auth::user();

        if ($user->role == 'siswa') {
            Siswa::where('id', $user->siswa_id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'jk' => $request->jk,
            ]);
        } else {
            Guru::where('id', $user->guru_id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'jk' => $request->jk,
            ]);
        }

        $usr = Auth::user();

        return response()->json([
            'success' => true,
            'msg' => 'Edit profil berhasil',
            'data' => $usr->siswa,
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|min:8|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        User::where('id', $user->id)->update([
            'password' => bcrypt($request->new_password),
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Ubah password berhasil. Silahkan lakukan log in ulang',
        ]);
    }

    public function homeDashboardSiswa()
    {
        $user = Auth::user();
        $siswa = Siswa::find($user->siswa_id);
        $guru = Guru::find($user->guru_id);
        if ($user->role == 'siswa') {
            $tugas = Tugas::with(['tugassiswasatuan', 'gurumatpel.guru', 'gurumatpel.matpel'])->whereRelation('gurumatpel', 'kelas_id', $siswa->kelas_id)->latest()->get();
            $materi = Materi::with(['gurumatpel.guru', 'gurumatpel.matpel'])->whereRelation('gurumatpel', 'kelas_id', $siswa->kelas_id)->latest()->get();
        } else {
            $tugas = Tugas::with(['gurumatpel.kelas', 'gurumatpel.matpel', 'gurumatpel.guru'])->whereRelation('gurumatpel', 'guru_id', $user->guru_id)->latest()->get();
            $materi = Materi::with(['gurumatpel.kelas', 'gurumatpel.matpel', 'gurumatpel.guru'])->whereRelation('gurumatpel', 'guru_id', $user->guru_id)->latest()->get();
        }


        return response()->json([
            'success' => true,
            'msg' => 'List Data Materi dan Tugas Anda',
            'tugas' => $tugas,
            'materi' => $materi,
        ]);
    }

    public function homeDashboardGuru()
    {
        $user = Auth::user();
        $tugas = Tugas::with(['gurumatpel.kelas', 'gurumatpel.matpel', 'gurumatpel.guru'])->whereRelation('gurumatpel', 'guru_id', $user->guru_id)->latest()->get();
        $materi = Materi::with(['gurumatpel.kelas', 'gurumatpel.matpel', 'gurumatpel.guru'])->whereRelation('gurumatpel', 'guru_id', $user->guru_id)->latest()->get();

        return response()->json([
            'success' => true,
            'msg' => 'List Data Materi dan Tugas Anda',
            'tugas' => $tugas,
            'materi' => $materi,
        ]);
    }
}
