<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        echo view('pages/home');
    }
}