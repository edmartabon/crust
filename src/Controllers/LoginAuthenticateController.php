<?php

namespace Crust\Controllers;

use Human;
use Illuminate\Http\Request;
use Crust\Contracts\HumanInterface;

class LoginAuthenticateController
{

	public function authenticate(HumanInterface $human, Request $request)
	{
		return $human->auth([
			'username' => $request['username'],
			'password' => $request['password']
		]);
	}

	public function logout(HumanInterface $human)
	{
		return $human->logout();
	}

}