<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 'siswa' || Auth::user()->role == 'guru') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('admin-dashboard');
            }
            
        }
        
        return view('auth.index');
    }
    
    public function loginStore(Request $request)
    {
        $cred = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt($cred)) {
            return redirect()->route('login')->with(['error' => 'Username or password is incorrect']);
        }

        $user = Auth::user();


        if ($user->role === 'siswa' || $user->role == 'guru') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('admin-dashboard');
        }

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
