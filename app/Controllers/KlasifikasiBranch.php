<?php

namespace App\Controllers;

use App\Models\KlasifikasiBranchModel;

class KlasifikasiBranch extends BaseController
{
    protected $KlasifikasiBranchModel;

    public function __construct()
    {   
        $this->KlasifikasiBranchModel = new KlasifikasiBranchModel();
    }

    public function index()
    {      
        $data = [
            'title' => 'Klasifikasi Branch',
            'menu' => 'klasifikasi_branch',
            'validation' => \Config\Services::validation(),
            'klasifikasi_branch' => $this->KlasifikasiBranchModel->findAll()
        ];
        
        return view('klasifikasi_branch/index', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_klasifikasi' => 'required'
        ])) {
            return redirect()->to('/klasifikasi_branch/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->KlasifikasiBranchModel->save([
            'nama_klasifikasi' => $this->request->getVar('nama_klasifikasi'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/klasifikasi_branch/index');
    }

    public function delete($id)
    {
        $this->KlasifikasiBranchModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('klasifikasi_branch/index');
    }

    public function edit($id) 
    {
        $data = [
            'title' => 'Form Edit Klasifikasi Branch',
            'validation' => \Config\Services::validation(),
            'klasifikasi_branch' => $this->KlasifikasiBranchModel->getKlasifikasiBranch($id)
        ];
        return view('klasifikasi_branch/index', $data);
    }

    public function update($id) 
    {
        $this->KlasifikasiBranchModel->save([
            'id' => $id,
            'nama_klasifikasi' => $this->request->getVar('nama_klasifikasi'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/klasifikasi_branch/index');
    }
}