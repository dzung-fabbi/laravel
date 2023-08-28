<?php

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepo
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($data)
    {
        return $this->user->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password)
        ]);
    }
}
