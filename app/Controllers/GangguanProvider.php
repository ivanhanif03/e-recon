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
        $now = date('Y-m-d H:i:s');

        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        $data = [
            'now' => $now,
            'title' => 'Daftar Gangguan',
            'menu' => 'gangguan_provider',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguanProvider($id_provider),
        ];
        // dd($data);

        return view('gangguan/provider/index', $data);
    }

    public function daftarSla()
    {
        // $data_submit = $this->GangguanModel->getAllWaktuSubmit();
        // $data_start = $this->GangguanModel->getAllWaktuEnd();

        // $sla = $data_submit - $data_submit;
        // $string_data_submit = (string)$data_submit->waktu_submit;
        // $string_data_start = (string)$data_end->end;

        // $waktu_submit = strtotime($string_data_submit);
        // $waktu_end = strtotime($string_data_end);

        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        $data = [
            'title' => 'Daftar SLA',
            'menu' => 'sla',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguanSelesaiProvider($id_provider),
            'link' => $this->LinkModel->findAll(),
            'status' => $this->StatusModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
        ];


        return view('gangguan/provider/daftar_sla', $data);
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

        session()->setFlashdata('pesan', 'Data submited successfully');

        return redirect()->to('/gangguan/provider/index');
    }

    public function stopClock($id)
    {
        //GET TAMBAHAN EXTRA TIME 
        $extra_time = $this->request->getVar('extra_time');

        $this->GangguanModel->save([
            'id' => $id,
            'id_status' => 2,
            'keterangan_stopclock' => $this->request->getVar('keterangan_stopclock'),
            'start_stopclock' => date('Y-m-d H:i:s'),
            'extra_time_stopclock' => $extra_time
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/gangguan/provider/index');
    }
}
