<?php

namespace App\Controllers;

use App\Models\ProviderModel;

class Provider extends BaseController
{
    protected $ProviderModel;

    public function __construct()
    {   
        $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {         
        $data = [
            'title' => 'Daftar Provider',
            'menu' => 'provider',
            'provider' => $this->ProviderModel->findAll()
        ];
        
        return view('provider/index', $data);
    }
}