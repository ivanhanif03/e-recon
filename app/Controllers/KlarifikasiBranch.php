<?php

namespace App\Controllers;

class KlarifikasiBranch extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Klarifikasi Branch',
        ];
        echo view('klarifikasi_branch', $data);
    }
}