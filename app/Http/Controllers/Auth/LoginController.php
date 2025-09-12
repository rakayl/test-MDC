<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
   public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
         $validator = Validator::make(request()->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->hasRole('customer')) {
                 return redirect()->intended('/');
            }
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak valid.',
        ])->withInput();
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
