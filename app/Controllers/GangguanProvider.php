<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\ProviderModel;
use App\Models\StatusModel;

class GangguanProvider extends BaseController
{
    protected $GangguanModel, $LinkModel, $StatusModel, $ProviderModel;

    public function __construct()
    {
        $this->GangguanModel = new GangguanModel();
        $this->LinkModel = new LinkModel();
        $this->StatusModel = new StatusModel();
        $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Gangguan',
            'menu' => 'gangguan_provider',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguan(),
            // 'link' => $this->LinkModel->findAll(),
            // 'status' => $this->StatusModel->findAll(),
            // 'provider' => $this->ProviderModel->findAll(),
        ];

        // dd($data);

        return view('gangguan/provider/index', $data);
    }

    public function submit($id)
    {
        //  Validation
        if (!$this->validate(
            [
                'keterangan_submit' => 'required',
                'bukti_submit' => [
                    'rules' => 'uploaded[bukti_submit]|max_size[bukti_submit,500]|mime_in[bukti_submit,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Harus ada file yang diupload',
                        'mime_in' => 'File extention harus berupa jpg,jpeg,png',
                        'max_size' => 'Ukuran file maksimal 2 MB'
                    ]

                ]
            ],
        )) {
            return redirect()->to('/gangguan/provider/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $submit = date('Y-m-d H:i:s');
        $upload = $this->request->getFile('bukti_submit');
        $upload->move(WRITEPATH . '../public/img_submit/');
        $fileName = $upload->getName();

        $this->GangguanModel->save([
            'id' => $id,
            'bukti_submit' => $fileName,
            'waktu_submit' => $submit,
            'keterangan_submit' => $this->request->getVar('keterangan_submit'),
            'id_status' => 2
        ]);

        // $upload->move(base_url('../img_submit/bukti'), $fileName);

        session()->setFlashdata('pesan', 'Data submited successfully');

        return redirect()->to('/gangguan/provider/index');
    }


    public function delete($id)
    {
        $this->GangguanModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('gangguan/btn/index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Gangguan',
            'validation' => \Config\Services::validation(),
            'branch' => $this->GangguanModel->getGangguan($id)
        ];
        return view('gangguan/btn/index', $data);
    }

    public function update($id)
    {
        $this->GangguanModel->save([
            'id' => $id,
            'nama_gangguan' => $this->request->getVar('nama_gangguan'),
            'id_link' => $this->request->getVar('nama_link'),
            'detail' => $this->request->getVar('detail')
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/gangguan/btn');
    }
}
