<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\StatusModel;

class Gangguan extends BaseController
{
    protected $GangguanModel, $LinkModel, $StatusModel;

    public function __construct()
    {   
        $this->GangguanModel = new GangguanModel();
        $this->LinkModel = new LinkModel();
        $this->StatusModel = new StatusModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Daftar Gangguan',
            'menu' => 'gangguan',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguan(),
            'link' => $this->LinkModel->findAll(),
            'status' => $this->StatusModel->findAll(),
        ];

        // dd($data);
        
        return view('gangguan/index', $data);
    }

    public function save()
    {
        $start = date('Y-m-d H:i:s');
        $end = date('Y-m-d H:i:s', strtotime('+ 2 hours'));

        $this->GangguanModel->save([
            'nomor_tiket' => 'TLK1',
            'nama_gangguan' => $this->request->getVar('nama_gangguan'),
            'id_link' => $this->request->getVar('link'),
            'detail' => $this->request->getVar('detail'),
            'start' => $start,
            'end' => $end,
            'id_status' => 1,
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/gangguan/index');
    }

    
    public function delete($id)
    {
        $this->BranchModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('branch/index');
    }

    public function edit($id) 
    {
        $data = [
            'title' => 'Form Edit Branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->BranchModel->getBranchAll($id)
        ];
        return view('branch/index', $data);
    }

    public function update($id) 
    {
        $this->BranchModel->save([
            'id' => $id,
            'kode_branch' => $this->request->getVar('kode_branch'),
            'nama_branch' => $this->request->getVar('nama_branch'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
            'id_regional' => $this->request->getVar('regional'),
            'id_jenis_branch' => $this->request->getVar('jenis_branch'),
            'id_klasifikasi_branch' => $this->request->getVar('klasifikasi_branch'),
            
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/branch');
    }
}