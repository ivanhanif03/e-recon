<?php

namespace App\Controllers;

class Branch extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Branch',
        ];
        echo view('branch/index', $data);
    }
}