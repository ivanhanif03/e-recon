<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'config' => config('Auth'),
        ];
        echo view('pages/login', $data);
    }
}