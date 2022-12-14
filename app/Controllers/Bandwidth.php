<?php

namespace App\Controllers;

use App\Models\BandwidthModel;

class Bandwidth extends BaseController
{
    protected $BandwidthModel;

    public function __construct()
    {
        $this->BandwidthModel = new BandwidthModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Bandwidth',
            'menu' => 'bandwidth',
            'validation' => \Config\Services::validation(),
            'bandwidth' => $this->BandwidthModel->findAll()
        ];

        return view('bandwidth/index', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'bandwidth' => 'required|is_unique[bandwidth.bandwidth,id,{id}]',
            'biaya_bulanan' => 'required'
        ])) {
            return redirect()->to('/bandwidth/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->BandwidthModel->save([
            'bandwidth' => $this->request->getVar('bandwidth'),
            'biaya_bulanan' => $this->request->getVar('biaya_bulanan'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/bandwidth/index');
    }

    public function delete($id)
    {
        $this->BandwidthModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('bandwidth/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Bandwidth',
            'validation' => \Config\Services::validation(),
            'bandwidth' => $this->BandwidthModel->getBandwidth($id)
        ];
        return view('bandwidth/index', $data);
    }

    public function update($id)
    {
        $this->BandwidthModel->save([
            'id' => $id,
            'bandwidth' => $this->request->getVar('bandwidth'),
            'biaya_bulanan' => $this->request->getVar('biaya_bulanan'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/bandwidth/index');
    }
}
