<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\ProviderModel;
use App\Models\StatusModel;

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
        $no_ticket = strtoupper(implode('', $matches[0])).$jml_gangguan ;

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