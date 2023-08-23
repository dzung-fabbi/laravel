<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterReq $request)
    {
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }

        return view('success');
    }
}
