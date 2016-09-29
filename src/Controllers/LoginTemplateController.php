<?php

namespace Crust\Controllers;

use Crust\Contracts\HumanInterface;

class LoginTemplateController
{
    public function login(HumanInterface $human)
    {
        if ($human->isAuth()) {
            return $human->moveHuman();
        }

        return view('crust::pages.login');
    }
}
