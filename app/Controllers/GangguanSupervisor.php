<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\ProviderModel;
use App\Models\StatusModel;

class GangguanSupervisor extends BaseController
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
            'title' => 'Approval Stopclock',
            'menu' => 'supervisor',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getGangguanSupervisor(),
            'link' => $this->LinkModel->findAll(),
            'status' => $this->StatusModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
        ];

        return view('gangguan/supervisor/index', $data);
    }

    public function stopClock()
    {
        $data = [
            'title' => 'Daftar Stopclock',
            'menu' => 'supervisor_stopclock',
            'validation' => \Config\Services::validation(),
            'gangguan' => $this->GangguanModel->getStopClockSupervisor(),
            'link' => $this->LinkModel->findAll(),
            'status' => $this->StatusModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
        ];

        return view('gangguan/supervisor/stopclock', $data);
    }

    public function approval($id)
    {
        //GET TAMBAHAN EXTRA TIME 
        $extra_time = $this->GangguanModel->getWaktuExtra($id);
        $end = $this->GangguanModel->getWaktuEnd($id);
        $start = $this->GangguanModel->getWaktuStart($id);

        //TO STRING DATE END PERBAIKAN GANGGUAN
        $string_extra = (string)$extra_time->extra_time_stopclock;
        $string_start = (string)$start->start;
        $string_end = (string)$end->end;

        //UPDATE EDN + EXTRA TIME
        $waktu_end_extra = strtotime("+" . $string_extra . " hours", strtotime($string_end));
        $end_update = date("Y-m-d H:i:s", $waktu_end_extra);
        $waktu_start_extra = strtotime("+" . $string_extra . " hours", strtotime($string_start));
        $start_update = date("Y-m-d H:i:s", $waktu_start_extra);

        // dd($end_update);

        $this->GangguanModel->save([
            'id' => $id,
            // 'start' => $start_update,
            // 'end' => $end_update,
            'id_status' => 6,
            'approval_stopclock_spv' => 'YES'
        ]);

        session()->setFlashdata('pesan', 'Data approved successfully');

        return redirect()->to('/gangguan/supervisor');
    }

    public function reject($id)
    {
        $this->GangguanModel->save([
            'id' => $id,
            'ket_reject_stopclock_spv' => $this->request->getVar('keterangan_reject'),
            'approval_stopclock_spv' => "NO",
            'id_status' => 1,
        ]);

        session()->setFlashdata('pesan', 'Data rejected successfully');

        return redirect()->to('/gangguan/supervisor');
    }
}
