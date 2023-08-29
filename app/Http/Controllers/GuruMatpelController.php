<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\GuruMatpel;
use App\Models\Kelas;
use App\Models\Matpel;
use Illuminate\Http\Request;

class GuruMatpelController extends Controller
{
    public function index()
    {
        $gurumatpel = GuruMatpel::latest()->get();

        return view('admin.pages.data_gurumatpel.datagurumatpel', compact('gurumatpel'));
    }

    public function addGuruMatpel()
    {
        $gurus = Guru::latest()->get();
        $kelas = Kelas::latest()->get();
        $matpels = Matpel::latest()->get();

        return view('admin.pages.data_gurumatpel.tambahgurumatpel', compact(['gurus', 'kelas', 'matpels']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas_id' => 'required',
            'matpel_id' => 'required',
            'guru_id' => 'required',
        ], [
            'kelas_id.required' => 'Kelas perlu diisi',
            'matpel_id.required' => 'Mata pelajaran perlu diisi',
            'guru_id.required' => 'Guru perlu diisi',
        ]);

        GuruMatpel::create([
            'kelas_id' => $request->kelas_id,
            'matpel_id' => $request->matpel_id,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin-gurumatpel');
    }

    public function edit($id)
    {
        $gurumatpel = GuruMatpel::where('id', $id)->first();

        $gurus = Guru::latest()->get();
        $kelas = Kelas::latest()->get();
        $matpels = Matpel::latest()->get();

        return view('admin.pages.data_gurumatpel.editgurumatpel', compact(['gurumatpel', 'gurus', 'kelas', 'matpels']));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'kelas_id' => 'required',
            'matpel_id' => 'required',
            'guru_id' => 'required',
        ], [
            'kelas_id.required' => 'Kelas perlu diisi',
            'matpel_id.required' => 'Mata pelajaran perlu diisi',
            'guru_id.required' => 'Guru perlu diisi',
        ]);

        GuruMatpel::where('id', $id)->update([
            'kelas_id' => $request->kelas_id,
            'matpel_id' => $request->matpel_id,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin-gurumatpel');
    }
    
    public function showDestroy($id)
    {
        $gurumatpel = GuruMatpel::where('id', $id)->first();
        
        return view('admin.pages.data_gurumatpel.components.modalcontenthapusgurumatpel', compact('gurumatpel'));
    }
    
    public function destroy($id)
    {
        GuruMatpel::where('id', $id)->delete();
        
        return redirect()->route('admin-gurumatpel');
    }
}
