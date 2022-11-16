<?php

namespace App\Controllers;

class Link extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Link',
        ];
        echo view('link/index', $data);
    }
}