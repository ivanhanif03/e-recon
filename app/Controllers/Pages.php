<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function gangguan()
    {
        $data = [
            'title' => 'Report Gangguan'
        ];
        return view('pages/gangguan', $data);

    }
}