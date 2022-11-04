<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        echo view('pages/login', $data);
    }
}