<?php

namespace App\Controllers;

class StopClock extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Stop Clock',
        ];
        echo view('stop_clock/index', $data);
    }
}