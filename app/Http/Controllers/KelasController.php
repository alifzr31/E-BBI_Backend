<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();

        return view('admin.pages.data_kelas.datakelas', compact('kelas'));
    }

    public function addKelas()
    {
        return view('admin.pages.data_kelas.tambahkelas');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kls_angka' => 'required',
            'kls_huruf' => 'required',
        ], [
            'kls_angka.required' => 'Kelang angka harus diisi',
            'kls_huruf.required' => 'Kelang huruf harus diisi',
        ]);

        Kelas::create([
            'kls_angka' => $request->kls_angka,
            'kls_huruf' => $request->kls_huruf,
        ]);

        return redirect()->route('admin-datakelas');
    }

    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->with('siswa')->first();

        return view('admin.pages.data_kelas.components.modalcontentdetailkelas', compact('kelas'));
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();

        return view('admin.pages.data_kelas.editkelas', compact('kelas'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'kls_angka' => 'required',
            'kls_huruf' => 'required',
        ], [
            'kls_angka.required' => 'Kelang angka harus diisi',
            'kls_huruf.required' => 'Kelang huruf harus diisi',
        ]);

        Kelas::where('id', $id)->update([
            'kls_angka' => $request->kls_angka,
            'kls_huruf' => $request->kls_huruf,
        ]);

        return redirect()->route('admin-datakelas');
    }

    public function showDestroy($id)
    {
        $kelas = Kelas::where('id', $id)->first();

        return view('admin.pages.data_kelas.components.modalcontenthapuskelas', compact('kelas'));
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();

        return redirect()->route('admin-datakelas');
    }
}
