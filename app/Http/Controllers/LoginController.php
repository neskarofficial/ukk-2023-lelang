<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function view()
    {
        return view('auth.login');
    }

    public function autheticatePetugas(Request $request)
    {
        $credentials = $request->validate(
            [
            'username' => 'required',
            'password' => 'required',
            ]
        );

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == 'admin')
            {
                return redirect()->route('admin.dashboard');
            } else if ($user->level == 'petugas') {
                return redirect()->route('petugas.dashboard');
                // return redirect()->intended('home');
            } else if ($user->level == 'masyarakat') {
                return redirect()->route('masyarakat.dashboard');
                // return redirect()->intended('/masyarakat/home');
            } else return redirect()->route('login');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
