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
            'role' => $this->RoleModel->findAll(),
            'pengguna' => $this->PenggunaModel->findAll()
        ];
        
        return view('hak_akses/index', $data);
    }
}