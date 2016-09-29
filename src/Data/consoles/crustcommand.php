<?php

use Crust\Contracts\HumanInterface;

Artisan::command('crust:seed', function (HumanInterface $human) {
    foreach ([
        [
            'username'      => 'administrator',
            'password'      => '1234',
            'email'         => 'administrator1@crust.dev',
            'first_name'    => 'admin',
            'last_name'     => '',
        ],
    ] as $value) {
        $human->add([
            'username'      => $value['username'],
            'password'      => $value['password'],
            'email'         => $value['email'],
            'first_name'    => $value['first_name'],
            'last_name'     => $value['last_name'],
        ])->modifyHumanRole([
            'administrator', '*',
        ]);
    }
});
