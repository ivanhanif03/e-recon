<?php

namespace App\Controllers;

class Order extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Report Order',
            'menu' => 'order',
            'provider' => [
                [
                    'no_tiket' => 'T1',
                    'provider' => 'Telkom',
                    'pic' => 'Ahmad',
                    'alamat' => 'Jl. Gang Merdeka',
                    'open_time' => '09.30',
                    'close_time' => '11.30'
                ],
                [
                    'no_tiket' => 'L1',
                    'provider' => 'Lintasarta',
                    'pic' => 'Joko',
                    'alamat' => 'Jl. Jalan sama kamu',
                    'open_time' => '13.34',
                    'close_time' => '15.34'
                ],
            ]
        ];
        return view('order/index', $data);
    }
}