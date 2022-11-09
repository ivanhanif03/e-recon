<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar User',
            'menu' => 'user',
            'user' => [
                [
                    'nama' => 'Supaijo',
                    'email' => 'sup@gmail.com',
                    'no_hp' => '08532222314',
                    'alamat' => 'Depok Margonda',
                    'provider' => 'BTN',
                    'hak_akses' => 'Admin',
                ],
                [
                    'nama' => 'Tarmono',
                    'email' => 'tar@gmail.com',
                    'no_hp' => '082143153332',
                    'alamat' => 'Cibinong',
                    'provider' => 'Telkom',
                    'hak_akses' => 'User',
                ],
                [
                    'nama' => 'Raisa',
                    'email' => 'rai@gmail.com',
                    'no_hp' => '085312235411',
                    'alamat' => 'Jaksel',
                    'provider' => 'Lintasarta',
                    'hak_akses' => 'User',
                ],
                [
                    'nama' => 'Jackson',
                    'email' => 'jack@gmail.com',
                    'no_hp' => '08537721312',
                    'alamat' => 'Slipi Palmerah',
                    'provider' => 'BTN',
                    'hak_akses' => 'User',
                ],
            ]
            // 'config' => config('Auth'),
        ];
        echo view('user/index', $data);
    }
}