<?php

namespace App\Http\Services;

use App\Http\Repository\UserRepo;

class UserService
{
    private $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function create($request)
    {
        return $this->userRepo->create($request);
    }
}
