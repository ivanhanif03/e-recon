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
            'provider' => $this->request->getPost('provider'),
            'outlet' => $this->request->getPost('outlet'),
            'PIC' => $this->request->getPost('pic'),
            'alamat' => $this->request->getPost('alamat')
        ]);

        return redirect()->to(base_url('gangguan/index'));
    }

}
