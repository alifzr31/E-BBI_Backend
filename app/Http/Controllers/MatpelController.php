<?php

namespace App\Http\Controllers;

use App\Models\Matpel;
use Illuminate\Http\Request;

class MatpelController extends Controller
{
    public function index()
    {
        $matpels = Matpel::latest()->get();

        return view('admin.pages.data_matpel.datamatpel', compact('matpels'));
    }

    public function addPelajaran()
    {
        return view('admin.pages.data_matpel.tambahmatpel');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_matpel' => 'required',
            'semester' => 'required',
        ], [
            'nama_matpel.required' => 'Nama pelajaran harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        Matpel::create([
            'nama_matpel' => $request->nama_matpel,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin-datamatpel');
    }

    public function show($id)
    {
        $matpel = Matpel::where('id', $id)->first();

        return view('admin.pages.data_matpel.components.modalcontentdetailmatpel', compact('matpel'));
    }

    public function edit($id)
    {
        $matpel = Matpel::where('id', $id)->first();

        return view('admin.pages.data_matpel.editmatpel', compact('matpel'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama_matpel' => 'required',
            'semester' => 'required',
        ], [
            'nama_matpel.required' => 'Nama pelajaran harus diisi',
            'semester.required' => 'Semester harus diisi',
        ]);

        Matpel::where('id', $id)->update([
            'nama_matpel' => $request->nama_matpel,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin-datamatpel');
    }
    
    public function showDestroy($id)
    {
        $matpel = Matpel::where('id', $id)->first();

        return view('admin.pages.data_matpel.components.modalcontenthapusmatpel', compact('matpel'));
    }

    public function destroy($id)
    {
        Matpel::where('id', $id)->delete();

        return redirect()->route('admin-datamatpel');
    }
}
