<?php

namespace App\Controllers;

use App\Models\HakAksesModel;

class HakAkses extends BaseController
{
    protected $HakAksesModel;

    public function __construct()
    {   
        $this->HakAksesModel = new HakAksesModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Hak Akses',
            'menu' => 'hak akses',
            'hak_akses' => $this->HakAksesModel->getHakAkses()
        ];
        
        return view('hak_akses/index', $data);
    }
}