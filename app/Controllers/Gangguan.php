<?php

namespace App\Controllers;

use App\Models\GangguanModel;

class Gangguan extends BaseController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        $gangguanModel = new GangguanModel();
        $gangguan = $gangguanModel->findAll();

        $data = [
            'title' => 'Report Gangguan',
            'menu' => 'gangguan',
            'gangguan' => $gangguan
        ];

        return view('gangguan/index', $data);
    }

    public function create()
    {
        $gangguanModel = new GangguanModel();
        $gangguanModel->insert([
            'nomor_tiket' => $this->request->getPost('no_tiket'),
            'provider' => $this->request->getPost('provider'),
            'branch' => $this->request->getPost('branch'),
            'PIC' => $this->request->getPost('pic'),
            'alamat' => $this->request->getPost('alamat'),
            'open_time' => $this->request->getPost('open_time'),
            'close_time' => $this->request->getPost('close_time'),
            'stop_clock' => $this->request->getPost('stop_clock'),
            'end_stop_clock' => $this->request->getPost('end_stop_clock')
        ]);

        return redirect()->to(base_url('gangguan/index'));
    }

}
