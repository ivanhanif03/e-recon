<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;
use App\Models\ProviderModel;
use App\Models\StatusModel;

class Pages extends BaseController
{
    protected $GangguanModel, $LinkModel;

    public function __construct()
    {
        $this->GangguanModel = new GangguanModel();
        $this->LinkModel = new LinkModel();
        // $this->StatusModel = new StatusModel();
        // $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {
        //GET BIAYA BULANAN AND SLA
        $sla = $this->GangguanModel->getAllSla();

        //SET BIAYA BULANAN - DENDA
        $biaya_denda = array();
        foreach ($sla as $s) {
            if ($s['sla'] >= 99.8) {
                $biaya_denda[] = ($s['biaya_bulanan'] - ($s['biaya_bulanan'] * 0));
            } elseif ($s['sla'] >= 98.8 and $s['sla'] < 99.8) {
                $biaya_denda[] = ($s['biaya_bulanan'] - ($s['biaya_bulanan'] * 0.1));
            } elseif ($s['sla'] >= 97.8 and $s['sla'] < 98.8) {
                $biaya_denda[] = ($s['biaya_bulanan'] - ($s['biaya_bulanan'] * 0.2));
            } elseif ($s['sla'] >= 96.8 and $s['sla'] < 97.8) {
                $biaya_denda[] = ($s['biaya_bulanan'] - ($s['biaya_bulanan'] * 0.3));
            } elseif ($s['sla'] >= 95.8 and $s['sla'] < 96.8) {
                $biaya_denda[] = ($s['biaya_bulanan'] - ($s['biaya_bulanan'] * 0.5));
            } elseif ($s['sla'] < 95.8) {
                $biaya_denda[] = ($s['biaya_bulanan'] - ($s['biaya_bulanan'] * 1));
            }
        }

        // dd($biaya_denda);

        //SET DENDA
        $denda = array();
        foreach ($sla as $s) {
            if ($s['sla'] >= 99.8) {
                $denda[] = ($s['biaya_bulanan'] * 0);
            } elseif ($s['sla'] >= 98.8 and $s['sla'] < 99.8) {
                $denda[] = ($s['biaya_bulanan'] * 0.1);
            } elseif ($s['sla'] >= 97.8 and $s['sla'] < 98.8) {
                $denda[] = ($s['biaya_bulanan'] * 0.2);
            } elseif ($s['sla'] >= 96.8 and $s['sla'] < 97.8) {
                $denda[] = ($s['biaya_bulanan'] * 0.3);
            } elseif ($s['sla'] >= 95.8 and $s['sla'] < 96.8) {
                $denda[] = ($s['biaya_bulanan'] * 0.5);
            } elseif ($s['sla'] < 95.8) {
                $denda[] = ($s['biaya_bulanan'] * 1);
            }
        }

        //SUM ALL DENDA
        $sum_denda = array_sum($denda);


        //GET CURRENT MONTH
        $month = date("F", strtotime('m'));

        //GET TOTAL GANGGUAN YANG ADA SLA
        $total_gangguan = $this->GangguanModel->getTotalGangguanSla();

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_sla = $this->GangguanModel->getJumlahAllSla();
        $sla = (float)$sum_sla;

        //GET JUMLAH TOTAL BIAYA BULANAN CONVERT TO FLOAT
        $biaya_bulanan = $this->GangguanModel->getJumlahAllBiayaBulanan();
        $sum_biaya_bulanan = (float)$biaya_bulanan;
        $biaya_bulanan_final = $sum_biaya_bulanan - $sum_denda;

        //AVERAGE SLA KESELURUHAN PERBULAN
        $avg_sla = $sla / $total_gangguan;
        $sla_format = number_format($avg_sla, 2, '.', '');

        $data = [
            'title' => 'Home',
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $this->GangguanModel->getTotalGangguan(),
            'current_gangguan' => $this->GangguanModel->getGangguanCurrent(),
            'avg_sla' => $sla_format,
            'month' => $month,
            'sum_denda' => $sum_denda,
            'biaya_bulanan_final' => $biaya_bulanan_final,
            'biaya_denda' => $biaya_denda
        ];

        // dd($data);

        return view('pages/home', $data);
    }
}
