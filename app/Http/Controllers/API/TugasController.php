<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GuruMatpel;
use App\Models\Matpel;
use App\Models\Siswa;
use App\Models\Tugas;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
{
    public function indextugas($guru_matpel_id)
    {
        $user = Auth::user();
        $siswa = Siswa::find($user->siswa_id);
        if ($user->role == 'siswa') {
            // $tugas = Tugas::where('guru_matpel_id', $guru_matpel_id)->with(['gurumatpel.guru'])->latest()->get();
            $tugas = GuruMatpel::where('id', $guru_matpel_id)->where('kelas_id', $siswa->kelas_id)->with(['matpel', 'tugas', 'kelas', 'guru'])->first();
        } else {
            $tugas = Tugas::where('guru_matpel_id', $guru_matpel_id)->latest()->get();
            // $tugas = GuruMatpel::where('id', $guru_matpel_id)->with(['guru', 'tugas'])->get();
        }


        return response()->json([
            'success' => true,
            'msg' => 'List Data Tugas',
            'data' => $tugas,
        ]);
    }

    public function detailtugas($tugas_id)
    {
        $user = Auth::user();
        if ($user->role == 'siswa') {
            // $tugas = TugasSiswa::where('siswa_id', $user->siswa_id)->where('tugas_id', $tugas_id)->with('tugas')->get();
            $tugas = Tugas::find($tugas_id);
            $tugassiswa = TugasSiswa::where('siswa_id', $user->siswa_id)->where('tugas_id', $tugas_id)->first();

            return response()->json([
                'success' => true,
                'msg' => 'List Data Detail Tugas',
                'tugas' => $tugas,
                'tugassiswa' => $tugassiswa,
            ]);
        } else {
            $tugas = Tugas::where('id', $tugas_id)->latest()->with(['tugassiswa.siswa'])->first();

            return response()->json([
                'success' => true,
                'msg' => 'List Data Detail Tugas',
                'data' => $tugas,
            ]);
        }
    }

    public function inputNilai($tugas_siswa_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nilai' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        TugasSiswa::where('id', $tugas_siswa_id)->update([
            'nilai' => $request->nilai,
        ]);

        $tugasSiswa = TugasSiswa::find($tugas_siswa_id);

        return response()->json([
            'success' => true,
            'msg' => 'Input nilai berhasil',
            'data' => $tugasSiswa,
        ]);
    }

    public function storeGuru(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guru_matpel_id' => 'required',
            'kelas_id' => 'required',
            'judul' => 'required|unique:materis',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file_tugas' => 'required|mimes:pdf,docx,doc,pptx,ppt|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $file_tugas = $request->file('file_tugas');
        $file_name = $file_tugas->getClientOriginalName();
        $file_tugas->storeAs('public/file_tugas', $file_name);

        $tugas = Tugas::create([
            'guru_matpel_id' => $request->guru_matpel_id,
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'file_tugas' => $file_name,
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Tambah tugas berhasil',
            'data' => $tugas,
        ]);
    }

    public function storeSiswa($id, Request $request)
    {
        $findTugas = Tugas::find($id);
        $user = Auth::user();

        if ($user->role == 'siswa') {
            $validator = Validator::make($request->all(), [
                'file_tugas_siswa' => 'required|mimes:pdf,docx,doc,pptx,ppt|max:5120',
            ]);
        } else {
            return response()->json(['msg' => 'Anda bukan siswa']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $file_tugas_siswa = $request->file('file_tugas_siswa');
        $file_name = $file_tugas_siswa->getClientOriginalName();
        $file_tugas_siswa->storeAs('public/file_tugas_siswa', $file_name);

        $now = date('Y-m-d H:i:s');

        if ($now > $findTugas->end_date) {
            $status = 'late';
        } else {
            $status = 'ontime';
        }


        TugasSiswa::create([
            'tugas_id' => $id,
            'siswa_id' => $user->siswa_id,
            'file_tugas_siswa' => $file_name,
            'status' => $status,
        ]);

        $tugasSiswa = Tugas::where('id', $id)->with('tugassiswa')->first();

        return response()->json([
            'success' => true,
            'msg' => 'Tugas berhasil dikumpulkan',
            'data' => $tugasSiswa,
        ]);
    }
}
