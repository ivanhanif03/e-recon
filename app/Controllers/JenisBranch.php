<?php

namespace App\Controllers;

class JenisBranch extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Jenis Branch',
        ];
        echo view('jenis_branch/index', $data);
    }
}