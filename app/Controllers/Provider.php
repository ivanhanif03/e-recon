<?php

namespace App\Controllers;

use App\Models\ProviderModel;

class Provider extends BaseController
{
    protected $ProviderModel;

    public function __construct()
    {   
        $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Daftar Provider',
            'menu' => 'provider',
            'provider' => $this->ProviderModel->findAll()
        ];
        
        return view('provider/index', $data);
    }

    public function save()
    {
        $this->ProviderModel->save([
            'kode_provider' => $this->request->getVar('kode_provider'),
            'nama_provider' => $this->request->getVar('nama_provider'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/provider');
    }

    public function delete($id)
    {
        $this->ProviderModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('provider/index');
    }

    public function edit($id) 
    {
        $data = [
            'title' => 'Form Edit Provider',
            'validation' => \Config\Services::validation(),
            'provider' => $this->ProviderModel->getProvider($id)
        ];
        return view('provider/index', $data);
    }

    public function update($id) 
    {
        $this->ProviderModel->save([
            'id' => $id,
            'kode_provider' => $this->request->getVar('kode_provider'),
            'nama_provider' => $this->request->getVar('nama_provider'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/provider/index');
    }
}