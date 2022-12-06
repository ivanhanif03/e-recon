<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\ProviderModel;
use App\Models\StatusModel;

class Pages extends BaseController
{
    protected $GangguanModel;

    public function __construct()
    {
        $this->GangguanModel = new GangguanModel();
        // $this->LinkModel = new LinkModel();
        // $this->StatusModel = new StatusModel();
        // $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $this->GangguanModel->getTotalGangguan(),
            'current_gangguan' => $this->GangguanModel->getGangguanCurrent(),
        ];

        // dd($data);

        return view('pages/home', $data);
    }
}
