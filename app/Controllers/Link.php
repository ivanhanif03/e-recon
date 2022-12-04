<?php

namespace App\Controllers;

use App\Models\LinkModel;
use App\Models\BranchModel;
use App\Models\PenggunaModel;
use App\Models\ProviderModel;

class Link extends BaseController
{
    protected $LinkModel, $BranchModel, $ProviderModel, $PenggunaModel;

    public function __construct()
    {
        $this->LinkModel = new LinkModel();
        $this->BranchModel = new BranchModel();
        $this->ProviderModel = new ProviderModel();
        $this->PenggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Link',
            'menu' => 'link',
            'validation' => \Config\Services::validation(),
            'link' => $this->LinkModel->getLink(),
            'branch' => $this->BranchModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
            'users' => $this->PenggunaModel->getPenggunaProvider(),
        ];

        // dd($data);

        return view('link/index', $data);
    }

    public function save()
    {
        $this->LinkModel->save([
            'nama_link' => $this->request->getVar('nama_link'),
            'id_branch' => $this->request->getVar('nama_branch'),
            'id_provider' => $this->request->getVar('nama_provider'),
            'id_pic' => $this->request->getVar('fullname'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/link/index');
    }


    public function delete($id)
    {
        $this->LinkModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('link/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Link',
            'validation' => \Config\Services::validation(),
            'link' => $this->LinkModel->getLink($id)
        ];
        return view('link/index', $data);
    }

    public function update($id)
    {
        $this->LinkModel->save([
            'id' => $id,
            'nama_link' => $this->request->getVar('nama_link'),
            'id_branch' => $this->request->getVar('nama_branch'),
            'id_provider' => $this->request->getVar('nama_provider'),
            'id_pic' => $this->request->getVar('fullname'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/link');
    }
}
