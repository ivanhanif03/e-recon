<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'menu' => 'dashboard',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function gangguan()
    {
        $data = [
            'title' => 'Report Gangguan',
            'menu' => 'gangguan',
            'provider' => [
                [
                    'no_tiket' => 'T1',
                    'provider' => 'Telkom',
                    'pic' => 'Ahmad',
                    'alamat' => 'Jl. Gang Merdeka',
                    'open_time' => '09.30'
                ],
                [
                    'no_tiket' => 'L1',
                    'provider' => 'Lintasarta',
                    'pic' => 'Joko',
                    'alamat' => 'Jl. Jalan sama kamu',
                    'open_time' => '13.34'
                ],
            ]
        ];
        return view('pages/gangguan', $data);

    }
    public function order()
    {
        $data = [
            'title' => 'Order',
            'menu' => 'order',
        ];
        return view('pages/order', $data);
    }
}