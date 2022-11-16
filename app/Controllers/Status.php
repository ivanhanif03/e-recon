<?php

namespace App\Controllers;

class Status extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Status',
        ];
        echo view('status/index', $data);
    }
}