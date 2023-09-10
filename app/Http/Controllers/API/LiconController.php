<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Licon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LiconController extends Controller
{
    public function index()
    {
        $licon = Licon::latest()->get();

        return response()->json([
            'success' => true,
            'msg' => 'List Data Live Conference',
            'data' => $licon,
        ]);
    }

    public function storeLicon($guru_matpel_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $now = date('Y-m-d H:i:s');

        $licon = Licon::create([
            'guru_matpel_id' => $guru_matpel_id,
            'judul' => $request->judul,
            'start_date' => $now,
            'status' => 'aktif',
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Tambah Data Live Conference',
            'data' => $licon,
        ]);
    }

    public function getOneLicon($guru_matpel_id)
    {
        $licon = Licon::where('guru_matpel_id', $guru_matpel_id)->latest()->first();

        return response()->json([
            'success' => true,
            'msg' => 'Detail Data Live Conference',
            'data' => $licon,
        ]);
    }

    public function selesaiLicon($licon_id)
    {
        $user = Auth::user();
        if ($user->role == 'guru') {
            $now = date('Y-m-d H:i:s');
            Licon::find($licon_id)->update([
                'end_date' => $now,
                'status' => 'selesai',
            ]);
        }

        $licon = Licon::find($licon_id);

        return response()->json([
            'success' => true,
            'msg' => 'Live Conference Telah Selesai',
            'data' => $licon,
        ]);
    }
}
