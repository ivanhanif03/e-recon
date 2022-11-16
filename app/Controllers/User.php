<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User',
        ];
        echo view('user/index', $data);
    }
}