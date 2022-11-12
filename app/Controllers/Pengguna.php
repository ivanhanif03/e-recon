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

    // public function delete($id){
    //     $news = new PenggunaModel();
    //     $news->delete($id);
    //     return redirect('pengguna/index');
    // }
}