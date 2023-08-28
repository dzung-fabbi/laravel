<?php

namespace App\Http\Services;

use App\Http\Repository\AuthRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private $authRepo;

    public function __construct(AuthRepo $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function check($account)
    {
        $user = $this->authRepo->getUser($account);

        if (!empty($user) && Hash::check($account->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home');
        }

        return redirect()->back();
    }
}
