<?php

namespace App\Controllers;

use App\Models\HakAksesModel;
use App\Models\PenggunaModel;
use App\Models\RoleModel;

class HakAkses extends BaseController
{
    protected $HakAksesModel, $GroupModel, $PenggunaModel;

    public function __construct()
    {   
        $this->HakAksesModel = new HakAksesModel();
        $this->RoleModel = new RoleModel();
        $this->PenggunaModel = new PenggunaModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Hak Akses',
            'menu' => 'hak_akses',
            'hak_akses' => $this->HakAksesModel->getHakAkses(),
            // 'no_hak_akses' => $this->HakAksesModel->getNoHakAkses(),
            'role' => $this->RoleModel->findAll(),
            'pengguna' => $this->PenggunaModel->findAll()
        ];
        
        return view('hak_akses/index', $data);
    }

    public function save()
    {
        $this->HakAksesModel->save([
            'group_id' => $this->request->getVar('group_id'),
            'user_id' => $this->request->getVar('user_id'),
        ]);

        session()->setFlashdata('pesan', 'Data created successfully');

        return redirect()->to('/hak_akses/index');
    }

    public function delete($user_id)
    {
        $this->HakAksesModel->delete($user_id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('hak_akses/index');
    }

    public function edit($user_id) 
    {
        $data = [
            'title' => 'Form Edit Hak Akses',
            'validation' => \Config\Services::validation(),
            'hak_akses' => $this->HakAksesModel->getHakAkses($user_id)
        ];
        return view('hak_akses/index', $data);
    }

    public function update($user_id) 
    {
        $this->HakAksesModel->save([
            'user_id' => $user_id,
            'group_id' => $this->request->getVar('group_id'),
            'user_id' => $this->request->getVar('user_id'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/hak_akses/index');
    }
}