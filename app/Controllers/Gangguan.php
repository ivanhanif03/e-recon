<?php

namespace App\Controllers;

use App\Models\GangguanModel;

class Gangguan extends BaseController
{
    protected $gangguanModel;
    public function __construct()
    {
        $this->gangguanModel = new GangguanModel();
    }
    public function index()
    {

        $gangguan = $this->$gangguanModel->findAll();

        $data = [
            'title' => 'Report Gangguan',
            'menu' => 'gangguan',
            'gangguan' => $gangguan
        ];

        dd($gangguan);
        return view('gangguan/index', $data);
    }
}
