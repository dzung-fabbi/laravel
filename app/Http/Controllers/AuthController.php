<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginReq;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginReq $request)
    {
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return redirect()->route('login');
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
