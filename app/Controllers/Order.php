<?php

namespace App\Controllers;

class Order extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Order',
            'menu' => 'order',
        ];
        return view('order/index', $data);
    }
}