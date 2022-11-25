<?php

namespace App\Controllers;

use App\Models\JenisBranchModel;

class JenisBranch extends BaseController
{
    protected $JenisBranchModel;

    public function __construct()
    {   
        $this->JenisBranchModel = new JenisBranchModel();
    }

    public function index()
    {      
        $data = [
            'title' => 'Jenis Branch',
            'menu' => 'jenis_branch',
            'validation' => \Config\Services::validation(),
            'jenis_branch' => $this->JenisBranchModel->findAll()
        ];
        
        return view('jenis_branch/index', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'jenis_branch' => 'required'
        ])) {
            return redirect()->to('/jenis_branch/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->JenisBranchModel->save([
            'jenis_branch' => $this->request->getVar('jenis_branch'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/jenis_branch/index');
    }

    public function delete($id)
    {
        $this->JenisBranchModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('jenis_branch/index');
    }

    public function edit($id) 
    {
        $data = [
            'title' => 'Form Edit Jenis Branch',
            'validation' => \Config\Services::validation(),
            'jenis_branch' => $this->JenisBranchModel->getJenisBranch($id)
        ];
        return view('jenis_branch/index', $data);
    }

    public function update($id) 
    {
        $this->JenisBranchModel->save([
            'id' => $id,
            'jenis_branch' => $this->request->getVar('jenis_branch'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/jenis_branch/index');
    }
}