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

    public function approval($id)
    {
        //GET TAMBAHAN EXTRA TIME 
        $extra_time = $this->request->getVar('extra_time');

        //TO STRING DATE END PERBAIKAN GANGGUAN
        $end = $this->GangguanModel->getWaktuEnd($id);
        $string_end = (string)$end->end;

        //UPDATE EDN + EXTRA TIME
        $waktu_end_extra = strtotime("+" . $extra_time . " hours", strtotime($string_end));
        $end_update = date("Y-m-d H:i:s", $waktu_end_extra);

        // dd($end_update);

        $this->GangguanModel->save([
            'id' => $id,
            'end' => $end_update,
            'id_status' => 4,
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/gangguan/supervisor');
    }
}
