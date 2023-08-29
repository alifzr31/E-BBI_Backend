<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();

        return view('admin.pages.data_siswa.datasiswa', compact('siswas'));
    }

    public function addSiswa()
    {
        $kelas = Kelas::get();
        
        return view('admin.pages.data_siswa.tambahsiswa', compact('kelas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:12,15',
            'jk' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'nis.required' => 'No. Induk Siswa harus diisi',
            'nis.unique' => 'No. Induk Siswa sudah digunakan',
            'nama.required' => 'Nama lengkap harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'no_telp.required' => 'No. Telepon harus diisi',
            'no_telp.numeric' => 'No. Telepon harus berupa angka',
            'no_telp.between' => 'No. Telepon harus 12 sampai 15 digit',
            'jk.required' => 'Jenis kelamin harus diisi',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $inputSiswa = Siswa::create([
            'kelas_id' => $request->kelas_id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jk' => $request->jk,
        ]);

        if ($inputSiswa) {
            $siswa = Siswa::where('nis', $request->nis)->first();
            
            User::create([
                'siswa_id' => $siswa->id,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'siswa',
            ]);
        }

        return redirect()->route('admin-datasiswa');
    }

    public function show($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        return view('admin.pages.data_siswa.components.modalcontentdetailsiswa', compact('siswa'));
    }

    public function edit($id, Request $request)
    {
        $siswa = Siswa::where('id', $id)->first();
        $kelas = Kelas::get();

        return view('admin.pages.data_siswa.editsiswa', compact(['siswa', 'kelas']));
    }

    public function update($id, Request $request)
    {
        $siswa = Siswa::where('id', $id)->first();

        if ($request->nis == $siswa->nis) {
            $this->validate($request, [
                'nis' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|numeric|digits_between:12,15',
                'jk' => 'required',
            ], [
                'nis.required' => 'No. Induk Siswa harus diisi',
                'nis.unique' => 'No. Induk Siswa sudah digunakan',
                'nama.required' => 'Nama lengkap harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'no_telp.required' => 'No. Telepon harus diisi',
                'no_telp.numeric' => 'No. Telepon harus berupa angka',
                'no_telp.between' => 'No. Telepon harus 12 sampai 15 digit',
                'jk.required' => 'Jenis kelamin harus diisi',
            ]);
        } else {
            $this->validate($request, [
                'nis' => 'required|unique:siswas',
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|numeric|digits_between:12,15',
                'jk' => 'required',
            ], [
                'nis.required' => 'No. Induk Siswa harus diisi',
                'nis.unique' => 'No. Induk Siswa sudah digunakan',
                'nama.required' => 'Nama lengkap harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'no_telp.required' => 'No. Telepon harus diisi',
                'no_telp.numeric' => 'No. Telepon harus berupa angka',
                'no_telp.between' => 'No. Telepon harus 12 sampai 15 digit',
                'jk.required' => 'Jenis kelamin harus diisi',
            ]);
        }

        Siswa::where('id', $id)->update([
            'kelas_id' => $request->kelas_id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jk' => $request->jk,
        ]);

        return redirect()->route('admin-datasiswa');
    }

    public function showDestroy($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        return view('admin.pages.data_siswa.components.modalcontenthapussiswa', compact('siswa'));
    }

    public function destroy($id)
    {
        Siswa::where('id', $id)->delete();

        return redirect()->route('admin-datasiswa');
    }
}
