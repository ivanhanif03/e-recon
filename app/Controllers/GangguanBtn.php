<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\ProviderModel;
use App\Models\StatusModel;
use DateTime;

class GangguanBtn extends BaseController
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
            'menu' => 'gangguan_btn',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguan(),
            'link' => $this->LinkModel->findAll(),
            'status' => $this->StatusModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
        ];

        // dd($data);

        return view('gangguan/btn/index', $data);
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

        $data = [
            'title' => 'Daftar SLA',
            'menu' => 'gangguan_btn_sla',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguanSelesai(),
            'link' => $this->LinkModel->findAll(),
            'status' => $this->StatusModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
        ];


        return view('gangguan/btn/daftar_sla', $data);
    }

    public function save()
    {
        //START AND END GANGGUAN
        $start = date('Y-m-d H:i:s');
        $end = date('Y-m-d H:i:s', strtotime('+ 2 hours'));

        //COUNT DATA GANGGUAN
        $jml_gangguan = $this->GangguanModel->getJumlahGangguan();

        //EXPLODE EACH VALUE LINK
        $link = $this->request->getVar('link');
        $sprd = explode("_", $link);
        $nama_link = $sprd[1];
        $id_link = $sprd[0];

        //EXPLODE EACH FIRST LETTER NAMA LINK + ID
        $expr = '/(?<=\s|^)\w/iu';
        preg_match_all($expr, $nama_link, $matches);
        $no_ticket = strtoupper(implode('', $matches[0])) . $jml_gangguan;

        $this->GangguanModel->save([
            'no_tiket' => $no_ticket,
            'nama_gangguan' => $this->request->getVar('nama_gangguan'),
            'id_link' => $id_link,
            'detail' => $this->request->getVar('detail'),
            'start' => $start,
            'end' => $end,
            'id_status' => 1,
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/gangguan/btn/index');
    }

    public function approval($id)
    {
        //GET DATA WAKTU SUBMIT, START, END BY ID
        $data_submit = $this->GangguanModel->getWaktuSubmit($id);
        $data_end = $this->GangguanModel->getWaktuEnd($id);
        $data_start = $this->GangguanModel->getWaktuStart($id);

        //CONVER TO STRING
        $string_data_submit = (string)$data_submit->waktu_submit;
        $string_data_end = (string)$data_end->end;
        $string_data_start = (string)$data_start->start;

        //STRING TO TIME
        $waktu_submit = strtotime($string_data_submit);
        $waktu_end = strtotime($string_data_end);
        $waktu_start = strtotime($string_data_start);

        //DURASI PENGERJAAN
        $durasi = $waktu_submit - $waktu_start;

        //DURASI OPERASI LAYANAN DALAM DETIK
        $durasi_layanan = 2678400;
        $availability = (($durasi_layanan - $durasi) / $durasi_layanan) * 100;
        $sla_format = number_format($availability, 2, '.', '');
        $sla = (float)$sla_format;

        $status = 0;

        if ($waktu_submit > $waktu_end) {
            $status = 3;
        } else {
            $status = 5;
        }

        $this->GangguanModel->save([
            'id' => $id,
            'sla' => $sla,
            'offline' => $durasi,
            'approval' => "YES",
            'id_status' => $status,
        ]);

        session()->setFlashdata('pesan', 'Data approved successfully');

        return redirect()->to('/gangguan/btn');
    }

    public function reject($id)
    {
        $this->GangguanModel->save([
            'id' => $id,
            'keterangan_reject' => $this->request->getVar('keterangan_reject'),
            'approval' => "NO",
            'id_status' => 1,
        ]);

        session()->setFlashdata('pesan', 'Data rejected successfully');

        return redirect()->to('/gangguan/btn');
    }

    public function approvalStopClock($id)
    {
        $this->GangguanModel->save([
            'id' => $id,
            'approval_stopclock' => "YES",
        ]);

        session()->setFlashdata('pesan', 'Data approved successfully');

        return redirect()->to('/gangguan/btn/index');
    }

    public function rejectStopClock($id)
    {
        $this->GangguanModel->save([
            'id' => $id,
            'ket_reject_stopclock' => $this->request->getVar('keterangan_reject'),
            'approval_stopclock' => "NO",
            'id_status' => 1,
        ]);

        session()->setFlashdata('pesan', 'Data rejected successfully');

        return redirect()->to('/gangguan/btn');
    }


    public function delete($id)
    {
        $this->GangguanModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('gangguan/btn');
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
            'detail' => $this->request->getVar('detail'),
            'id_link' => $this->request->getVar('link'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/gangguan/btn');
    }
}
