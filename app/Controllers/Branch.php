<?php

namespace App\Controllers;

use App\Models\BranchModel;

class Branch extends BaseController
{
    protected $BranchModel;

    public function __construct()
    {   
        $this->BranchModel = new BranchModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Daftar Branch',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->BranchModel->findAll()
        ];
        
        return view('branch/index', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kode_branch' => 'required',
            'nama_branch' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ])) {
            return redirect()->to('/branch/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->BranchModel->save([
            'kode_branch' => $this->request->getVar('kode_branch'),
            'nama_branch' => $this->request->getVar('nama_branch'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/branch/index');
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
            'provider' => $this->BranchModel->getBranch($id)
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
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/branch');
    }
}