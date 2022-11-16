<?php

namespace App\Controllers;

class Regional extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Regional',
        ];
        echo view('regional/index', $data);
    }
}