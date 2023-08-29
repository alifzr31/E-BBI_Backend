<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\GuruMatpel;
use App\Models\Siswa;
use App\Models\SiswaMatpel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $total_siswa = Siswa::count();
        $total_guru = Guru::count();
        $total_gurumatpel = GuruMatpel::count();

        return view('admin.index', compact(['users', 'total_siswa', 'total_guru', 'total_gurumatpel']));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->role == 'siswa') {
            $usr = Siswa::where('id', $user->siswa_id)->first();
        } else {
            $usr = Guru::where('id', $user->guru_id)->first();
        }


        return view('admin.pages.data_user.edituser', compact(['user', 'usr']));
    }

    public function update($id, Request $request)
    {
        $user = User::where('id', $id)->first();

        if ($request->username == $user->username) {
            $this->validate($request, [
                'username' => 'required',
            ], [
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
            ]);
        } else {
            $this->validate($request, [
                'username' => 'required|unique:users',
            ], [
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah digunakan',
            ]);
        }

        User::where('id', $id)->update([
            'username' => $request->username,
        ]);

        return redirect()->route('admin-dashboard');
    }

    public function resetPassword($id)
    {
        User::where('id', $id)->update([
            'password' => bcrypt('password'),
        ]);

        return redirect()->route('admin-dashboard');
    }
}
