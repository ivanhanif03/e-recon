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
            'title' => 'Report Gangguan',
            'provider' => [
                [
                    'nama' => 'Telkom',
                    'kota' => 'Jakarta',
                    'alamat' => 'Jl. Gang'
                ],
                [
                    'nama' => 'Lintasarta',
                    'kota' => 'Depok',
                    'alamat' => 'Jl. Jalan'
                ]
            ]
        ];
        return view('pages/gangguan', $data);

    }
}