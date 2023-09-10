<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GuruMatpel;
use App\Models\Materi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    public function indexmateriperpelajaran($id)
    {
        $user = Auth::user();
        $siswa = Siswa::where('id', $user->siswa_id)->first();

        if ($user->role == 'siswa') {
            $materi = GuruMatpel::where('id', $id)->where('kelas_id', $siswa->kelas_id)->with(['matpel', 'materi', 'kelas', 'guru'])->first();
        } else {
            $materi = GuruMatpel::where('id', $id)->with(['matpel', 'materi', 'kelas'])->first();
        }


        return response()->json([
            'success' => true,
            'msg' => 'List Materi Anda',
            'data' => $materi,
        ]);
    }

    public function show($id)
    {
        $materi = Materi::find($id);

        return response()->json([
            'success' => true,
            'msg' => 'Detail Materi',
            'data' => $materi,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guru_matpel_id' => 'required',
            'kelas_id' => 'required',
            'judul' => 'required|unique:materis',
            'subjudul' => 'required',
            'deskripsi' => 'required',
            'file_materi' => 'required|mimes:pdf,docx,doc,pptx,ppt|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $file_materi = $request->file('file_materi');
        $file_name = $file_materi->getClientOriginalName();
        $file_materi->storeAs('public/file_materi', $file_name);

        $materi = Materi::create([
            'guru_matpel_id' => $request->guru_matpel_id,
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'file_materi' => $file_name,
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Upload materi berhasil',
            'data' => $materi,
        ]);
    }

    public function update($id, Request $request)
    {
        $materi = Materi::find($id);

        if ($request->judul == $materi->judul) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'subjudul' => 'required',
                'deskripsi' => 'required',
                'file_materi' => 'mimes:pdf,docx,doc,pptx,ppt|max:5120',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'judul' => 'required|unique:materis',
                'subjudul' => 'required',
                'deskripsi' => 'required',
                'file_materi' => 'mimes:pdf,docx,doc,pptx,ppt|max:5120',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
        }

        if ($request->hasFile('file_materi')) {
            $file_materi = $request->file('file_materi');
            $file_name = $file_materi->getClientOriginalName();
            $file_materi->storeAs('public/file_materi', $file_name);

            Storage::delete('public/file_materi/' . $materi->file_materi);

            $materi->update([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'deskripsi' => $request->deskripsi,
                'file_materi' => $file_name,
            ]);
        } else {
            $materi->update([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'deskripsi' => $request->deskripsi,
            ]);
        }


        return response()->json([
            'success' => true,
            'msg' => 'Edit materi berhasil',
            'data' => $materi,
        ]);
    }
}
