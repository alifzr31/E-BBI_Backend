<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GuruMatpel;
use App\Models\Matpel;
use App\Models\Tugas;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
{
    public function indextugas($id)
    {
        $user = Auth::user();
        if ($user->role == 'siswa') {
            $tugas = GuruMatpel::where('id', $id)->with(['matpel', 'kelas', 'guru', 'tugas.tugassiswa.siswa'])->first();
            // $tugassiswa = TugasSiswa::where('siswa_id', 1)->first();
            $tgs = Tugas::where('guru_matpel_id', $id)->with(['tugassiswa', 'siswa'])->get();
            // $tugas = Tugas::where('guru_matpel_id', $id)->latest()->with(['gurumatpel'])->get();
        } else {
            $tugas = Tugas::where('guru_matpel_id', $id)->latest()->with(['tugassiswa.siswa'])->get();
        }

        return response()->json([
            'success' => true,
            'msg' => 'List Data Tugas',
            'data' => $tugas,
        ]);
    }

    public function storeGuru(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guru_matpel_id' => 'required',
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
