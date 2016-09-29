<?php

namespace Crust\Controllers;

use Crust\Contracts\HumanInterface;

class CrustMigrationController
{
    public function index(HumanInterface $human)
    {
        echo 'test';
        exit;
        $this->createUser($human);
    }

    private function createUser(HumanInterface $human)
    {
        foreach ([
            [
                'username'   => 'administrator1',
                'password'   => '1234',
                'email'         => 'administrator1@crust.dev',
                'first_name' => 'admin',
                'last_name'  => '',
            ],
            [
                'username'   => 'edmartabon',
                'password'   => '1234',
                'email'         => 'edmartabon1@crust.dev',
                'first_name' => 'edmart',
                'last_name'  => 'abon',
            ],
        ] as $value) {
            $human->add([
                'username'      => $value['username'],
                'password'      => $value['password'],
                'email'         => $value['email'],
                'first_name'    => $value['first_name'],
                'last_name'     => $value['last_name'],
            ])->getHumanRole([
                'administrator', '*',
            ]);
        }
    }
}
