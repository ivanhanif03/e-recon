<?php

namespace App\Controllers;

use App\Models\BandwidthModel;
use App\Models\LinkModel;
use App\Models\BranchModel;
use App\Models\PenggunaModel;
use App\Models\ProviderModel;

class Link extends BaseController
{
    protected $LinkModel, $BranchModel, $ProviderModel, $PenggunaModel, $BandwidthModel;

    public function __construct()
    {
        $this->LinkModel = new LinkModel();
        $this->BranchModel = new BranchModel();
        $this->ProviderModel = new ProviderModel();
        $this->PenggunaModel = new PenggunaModel();
        $this->BandwidthModel = new BandwidthModel();
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
            'bandwidth' => $this->BandwidthModel->findAll(),
            'users' => $this->PenggunaModel->getPenggunaProvider(),
        ];

        return view('link/index', $data);
    }

    public function save()
    {
        $bandwidth = $this->request->getVar('bandwidth');

        //EXPLODE EACH VALUE BRANCH
        $branch = $this->request->getVar('nama_branch');
        $sprd = explode("_", $branch);
        $nama_branch = $sprd[1];

        //EXPLODE EACH VALUE PROVIDER
        $provider = $this->request->getVar('nama_provider');
        $sprd = explode("_", $provider);
        $nama_provider = $sprd[1];

        //COMBINER BRANCH & PROVIDER
        $nama_link = $nama_branch . " " . $nama_provider;

        $id_branch = $this->request->getVar('nama_branch');
        $count_branch = $this->LinkModel->getJumlahBranch($id_branch);

        if ($count_branch < 2) {
            $this->LinkModel->save([
                'nama_link' => $nama_link,
                'id_branch' => $this->request->getVar('nama_branch'),
                'id_provider' => $this->request->getVar('nama_provider'),
                'id_pic' => $this->request->getVar('fullname'),
                'id_bandwidth' => $this->request->getVar('bandwidth'),
                'jenis_link' => $this->request->getVar('jenis_link'),
            ]);

            session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert" id="alert-delete">Data created successfully</div>');
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert" id="alert-delete">Gagal, link ' . $nama_branch . ' sudah terdaftar!</div>');
        }

        // dd($data);


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
            'id_branch' => $this->request->getVar('nama_branch'),
            'id_provider' => $this->request->getVar('nama_provider'),
            'id_pic' => $this->request->getVar('fullname'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/link');
    }
}
