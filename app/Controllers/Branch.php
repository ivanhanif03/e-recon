<?php

namespace App\Controllers;

use App\Models\BranchModel;
use App\Models\JenisBranchModel;
use App\Models\KlasifikasiBranchModel;
use App\Models\RegionalModel;

class Branch extends BaseController
{
    protected $BranchModel, $RegionalModel, $JenisBranchModel, $KlasifikasiBranchModel;

    public function __construct()
    {
        $this->BranchModel = new BranchModel();
        $this->RegionalModel = new RegionalModel();
        $this->JenisBranchModel = new JenisBranchModel();
        $this->KlasifikasiBranchModel = new KlasifikasiBranchModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Branch',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch_all' => $this->BranchModel->getBranchAll(),
            'regional' => $this->RegionalModel->findAll(),
            'jenis_branch' => $this->JenisBranchModel->findAll(),
            'klasifikasi_branch' => $this->KlasifikasiBranchModel->findAll(),
        ];

        // dd($data);

        return view('branch/index', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kode_branch' => 'required|is_unique[branch.kode_branch,id,{id}]',
            'nama_branch' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ])) {
            return redirect()->to('/branch/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->BranchModel->save([
            'kode_branch' => $this->request->getVar('kode_branch'),
            'nama_branch' => $this->request->getVar('nama_branch'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telp' => $this->request->getVar('no_telp'),
            'id_regional' => $this->request->getVar('regional'),
            'id_jenis_branch' => $this->request->getVar('jenis_branch'),
            'id_klasifikasi_branch' => $this->request->getVar('klasifikasi_branch'),
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
