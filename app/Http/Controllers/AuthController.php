<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginReq;
use App\Http\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginReq $request)
    {
        return $this->authService->check($request);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
