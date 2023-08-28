<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterReq;
use App\Http\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterReq $request)
    {
        $this->userService->create($request);

        return view('success');
    }
}
