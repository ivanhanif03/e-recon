<?php

namespace App\Controllers;

use App\Models\PenggunaModel;
use App\Models\ProviderModel;
use App\Models\RoleModel;
use \Myth\Auth\Authorization\GroupModel;

class Pengguna extends BaseController
{
    protected $PenggunaModel, $RoleModel, $ProviderModel;

    public function __construct()
    {   
        $this->PenggunaModel = new PenggunaModel();
        $this->RoleModel = new RoleModel();
        $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Daftar Pengguna',
            'menu' => 'pengguna',
            'pengguna' => $this->PenggunaModel->getPengguna(),
            'role' => $this->RoleModel->findAll(),
            'provider' => $this->ProviderModel->findAll(),
        ];
        
        return view('pengguna/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengguna',
            'pengguna' => $this->PenggunaModel->getPengguna($id)
        ];

        //jika pengguna tidak ada di tabel
        if(empty($data['pengguna']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengguna dengan ID : ' . $id . ' tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        $this->PenggunaModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('pengguna/index');
    }

    public function edit($id) 
    {
        $data = [
            'title' => 'Form Edit Pengguna',
            'validation' => \Config\Services::validation(),
            'pengguna' => $this->PenggunaModel->getPengguna($id)
        ];
        return view('pengguna/index', $data);
    }

    public function update($id) 
    {
        $this->PenggunaModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'no_hp' => $this->request->getVar('no_hp'),   
            'alamat' => $this->request->getVar('alamat'),   
            'provider' => $this->request->getVar('provider'),   
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/pengguna');
    }
}