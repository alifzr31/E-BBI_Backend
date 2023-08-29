<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('user')->get();

        return view('admin.pages.data_guru.dataguru', compact('gurus'));
    }

    public function addGuru()
    {
        return view('admin.pages.data_guru.tambahguru');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|unique:gurus',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|digits_between:12,15',
            'jk' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'nip.required' => 'No. Induk Pegawai harus diisi',
            'nip.unique' => 'No. Induk Pegawai sudah digunakan',
            'nama.required' => 'Nama lengkap harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'no_telp.required' => 'No. Telepon harus diisi',
            'no_telp.numeric' => 'No. Telepon harus berupa angka',
            'no_telp.between' => 'No. Telepon harus 12 sampai 15 digit',
            'jk.required' => 'Jenis kelamin harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $inputGuru = Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jk' => $request->jk,
        ]);

        if ($inputGuru) {
            $guru = Guru::where('nip', $request->nip)->first();

            User::create([
                'guru_id' => $guru->id,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'guru',
            ]);
        }

        return redirect()->route('admin-dataguru');
    }

    public function show($id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('admin.pages.data_guru.components.modalcontentdetailguru', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('admin.pages.data_guru.editguru', compact('guru'));
    }

    public function update($id, Request $request)
    {
        $guru = Guru::where('id', $id)->first();

        if ($request->nip == $guru->nip) {
            $this->validate($request, [
                'nip' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|numeric|digits_between:12,15',
                'jk' => 'required',
            ], [
                'nip.required' => 'No. Induk Pegawai harus diisi',
                'nama.required' => 'Nama lengkap harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'no_telp.required' => 'No. Telepon harus diisi',
                'no_telp.numeric' => 'No. Telepon harus berupa angka',
                'no_telp.between' => 'No. Telepon harus 12 sampai 15 digit',
                'jk.required' => 'Jenis kelamin harus diisi',
            ]);
        } else {
            $this->validate($request, [
                'nip' => 'required|unique:gurus',
                'nama' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|numeric|digits_between:12,15',
                'jk' => 'required',
            ], [
                'nip.required' => 'No. Induk Pegawai harus diisi',
                'nip.unique' => 'No. Induk Pegawai sudah digunakan',
                'nama.required' => 'Nama lengkap harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'no_telp.required' => 'No. Telepon harus diisi',
                'no_telp.numeric' => 'No. Telepon harus berupa angka',
                'no_telp.between' => 'No. Telepon harus 12 sampai 15 digit',
                'jk.required' => 'Jenis kelamin harus diisi',
            ]);
        }

        Guru::where('id', $id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jk' => $request->jk,
        ]);

        return redirect()->route('admin-dataguru');
    }

    public function showDestroy($id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('admin.pages.data_guru.components.modalcontenthapusguru', compact('guru'));
    }

    public function destroy($id)
    {
        $guru = Guru::where('id', $id)->delete();
        return redirect()->route('admin-dataguru');
    }
}
