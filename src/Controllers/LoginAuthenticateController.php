<?php

namespace Crust\Controllers;

use Crust\Contracts\HumanInterface;
use Illuminate\Http\Request;

class LoginAuthenticateController
{
    public function authenticate(HumanInterface $human, Request $request)
    {
        return $human->auth([
            'username' => $request['username'],
            'password' => $request['password'],
        ]);
    }

    public function logout(HumanInterface $human)
    {
        return $human->logout();
    }
}
