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

        //SET BIAYA BULANAN
        $biaya_bulanan = 0;
        if ($bandwidth == '32') {
            $biaya_bulanan = 1250000;
        } elseif ($bandwidth == '64') {
            $biaya_bulanan = 1125000;
        } elseif ($bandwidth == '128') {
            $biaya_bulanan = 1550000;
        } elseif ($bandwidth == '256') {
            $biaya_bulanan = 2500000;
        } elseif ($bandwidth == '512') {
            $biaya_bulanan = 2950000;
        } elseif ($bandwidth == '1000') {
            $biaya_bulanan = 3750000;
        } elseif ($bandwidth == '2000') {
            $biaya_bulanan = 4550000;
        } elseif ($bandwidth == '4000') {
            $biaya_bulanan = 6100000;
        } else {
            $biaya_bulanan = 6100000;
        }


        $data = $this->LinkModel->save([
            'nama_link' => $nama_link,
            'id_branch' => $this->request->getVar('nama_branch'),
            'id_provider' => $this->request->getVar('nama_provider'),
            'id_pic' => $this->request->getVar('fullname'),
            'bandwidth' => $this->request->getVar('bandwidth'),
            'jenis_link' => $this->request->getVar('jenis_link'),
            'biaya_bulanan' => $biaya_bulanan,
        ]);
        // dd($data);

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
            'id_branch' => $this->request->getVar('nama_branch'),
            'id_provider' => $this->request->getVar('nama_provider'),
            'id_pic' => $this->request->getVar('fullname'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/link');
    }
}
