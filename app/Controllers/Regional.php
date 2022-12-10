<?php

namespace App\Controllers;

use App\Models\RegionalModel;

class Regional extends BaseController
{
    protected $RegionalModel;

    public function __construct()
    {
        $this->RegionalModel = new RegionalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Regional',
            'menu' => 'regional',
            'validation' => \Config\Services::validation(),
            'regional' => $this->RegionalModel->findAll()
        ];

        return view('regional/index', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kode_regional' => 'required|is_unique[regional.kode_regional,id,{id}]',
            'nama_regional' => 'required'
        ])) {
            return redirect()->to('/regional/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->RegionalModel->save([
            'kode_regional' => $this->request->getVar('kode_regional'),
            'nama_regional' => $this->request->getVar('nama_regional'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/regional/index');
    }


    public function delete($id)
    {
        $this->RegionalModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('regional/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Regional',
            'validation' => \Config\Services::validation(),
            'provider' => $this->RegionalModel->getRegional($id)
        ];
        return view('regional/index', $data);
    }

    public function update($id)
    {
        $this->RegionalModel->save([
            'id' => $id,
            'kode_regional' => $this->request->getVar('kode_regional'),
            'nama_regional' => $this->request->getVar('nama_regional'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/regional');
    }
}
