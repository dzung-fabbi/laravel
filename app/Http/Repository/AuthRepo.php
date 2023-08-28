<?php

namespace App\Http\Repository;

use App\Models\User;

class AuthRepo
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getUser($account)
    {
        return $this->user->where('email', $account->email)->first();
    }
}
