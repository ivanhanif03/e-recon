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
        // dd($provider);
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

        // dd($id_provider);
        $data = [
            'now' => $now,
            'title' => 'Daftar Gangguan',
            'menu' => 'gangguan_provider',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguanProvider($id_provider),
        ];

        return view('gangguan/provider/index', $data);
    }

    public function daftarSla()
    {
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

    public function start($id)
    {
        if (!$this->validate(
            [
                'keterangan_start' => 'required'
            ],
        )) {
            return redirect()->to('/gangguan/provider/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $start_gangguan = $this->GangguanModel->getWaktuStart($id);
        $start_perbaikan = date('Y-m-d H:i:s');

        //CONVER TO STRING
        $string_start_gangguan = (string)$start_gangguan->start;
        $string_start_perbaikan = (string)$start_perbaikan;

        //STRING TO TIME
        $waktu_start_gangguan = strtotime($string_start_gangguan);
        $waktu_start_perbaikan = strtotime($string_start_perbaikan);

        //DURASI PENGERJAAN
        $waktu_respon = $waktu_start_perbaikan - $waktu_start_gangguan;

        $this->GangguanModel->save([
            'id' => $id,
            'waktu_start' => $start_perbaikan,
            'waktu_respon' => $waktu_respon,
            'keterangan_start' => $this->request->getVar('keterangan_start'),
            'id_status' => 2
        ]);

        session()->setFlashdata('pesan', 'Data submited successfully');

        return redirect()->to('/gangguan/provider/index');
    }

    public function submit($id)
    {
        if (!$this->validate(
            [
                'keterangan_submit' => 'required',
                'bukti_submit' => [
                    'rules' => 'uploaded[bukti_submit]|max_size[bukti_submit,500]|mime_in[bukti_submit,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Harus ada file yang diupload',
                        'mime_in' => 'File extention harus berupa jpg,jpeg,png',
                        'max_size' => 'Ukuran file maksimal 500 Kb'
                    ]

                ]
            ],
        )) {
            return redirect()->to('/gangguan/provider/index')->withInput()->with('errors', $this->validator->getErrors());
        }

        $start_perbaikan = $this->GangguanModel->getWaktuStartGangguan($id);
        $submit = date('Y-m-d H:i:s');

        //CONVER TO STRING
        $string_start_perbaikan = (string)$start_perbaikan->waktu_start;
        $string_now = (string)$submit;

        //STRING TO TIME
        $waktu_start_perbaikan = strtotime($string_start_perbaikan);
        $waktu_now = strtotime($string_now);

        //DURASI PENGERJAAN
        $waktu_perbaikan = $waktu_now - $waktu_start_perbaikan;

        $upload = $this->request->getFile('bukti_submit');
        $upload->move(WRITEPATH . '../public/img_submit/');
        $fileName = $upload->getName();

        $this->GangguanModel->save([
            'id' => $id,
            'bukti_submit' => $fileName,
            'waktu_submit' => $submit,
            'waktu_perbaikan' => $waktu_perbaikan,
            'keterangan_submit' => $this->request->getVar('keterangan_submit'),
            'id_status' => 3
        ]);

        session()->setFlashdata('pesan', 'Data submited successfully');

        return redirect()->to('/gangguan/provider/index');
    }

    public function stopClock($id)
    {
        $this->GangguanModel->save([
            'id' => $id,
            'id_status' => 4,
            'keterangan_stopclock' => $this->request->getVar('keterangan_stopclock'),
            'start_stopclock' => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/gangguan/provider/index');
    }
}
