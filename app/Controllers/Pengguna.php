<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    protected $PenggunaModel;

    public function __construct()
    {   
        $this->PenggunaModel = new PenggunaModel();
    }

    public function index()
    {
        // $user = $this->PenggunaModel->findAll();
        
        $data = [
            'title' => 'Daftar Pengguna',
            'menu' => 'pengguna',
            'user' => $this->PenggunaModel->getPengguna()
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

    public function create()
    {
        // $pengguna = new PenggunaModel();
        $data = [
            'title' => 'Form Tambah Pengguna'
        ];
        // $pengguna->createPengguna($data);
        // return redirect()->to('/pengguna');
    }

    public function save()
    {
        $this->PenggunaModel->save([
            'email' =>$this->request->getVar('email'),
            'username' =>$this->request->getVar('username'),
            'no_hp' =>$this->request->getVar('no_hp'),
            'fullname' =>$this->request->getVar('fullname'),
            'password_hash' =>bin2hex($this->request->getVar('password')),
            'alamat' =>$this->request->getVar('alamat'),
            'provider' =>$this->request->getVar('provider'),
            'hak_akses' =>$this->request->getVar('hak_akses'),
            ''
        ]);

        return redirect()->to('/pengguna');
    }
}