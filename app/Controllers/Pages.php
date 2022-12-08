<?php

namespace App\Controllers;

use App\Models\GangguanModel;
use App\Models\LinkModel;

class Pages extends BaseController
{
    protected $GangguanModel, $LinkModel;

    public function __construct()
    {
        $this->GangguanModel = new GangguanModel();
        $this->LinkModel = new LinkModel();
    }

    public function index()
    {
        //GET ID PROVIDER FROM LOGIN
        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        //GET CURRENT GANGGUAN BASED USER PROVIDER OR NOT
        $get_data_all = $this->GangguanModel->getGangguanCurrent();
        $get_data_provider = $this->GangguanModel->getGangguanSelesaiProvider($id_provider);

        //GET TOTAL GANGGUAN BASED USER PROVIDER OR NOT
        $get_total_all = $this->GangguanModel->getTotalGangguan();
        // $total_gangguan = $this->GangguanModel->getTotalGangguanSla();
        $get_total_provider = $this->GangguanModel->getTotalGangguanProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_sla_all = $this->GangguanModel->getJumlahAllSla();
        $sum_sla_provider = $this->GangguanModel->getJumlahAllSlaProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_restitusi_all = $this->GangguanModel->getJumlahRestitusi();
        $sum_restitusi_provider = $this->GangguanModel->getJumlahRestitusiProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_biaya_all = $this->GangguanModel->getJumlahAllBiayaBulanan();
        $sum_biaya_provider = $this->GangguanModel->getJumlahAllBiayaBulananProvider($id_provider);

        //SET DATA IF USER PROVIDER OR NOT
        if ($provider != null) {
            $current_gangguan = $get_data_provider;
            $total_gangguan = $get_total_provider;
            $sum_sla = $sum_sla_provider;
            $sum_restitusi = $sum_restitusi_provider;
            $sum_biaya_bulanan = $sum_biaya_provider;
        } else {
            $current_gangguan = $get_data_all;
            $total_gangguan = $get_total_all;
            $sum_sla = $sum_sla_all;
            $sum_restitusi = $sum_restitusi_all;
            $sum_biaya_bulanan = $sum_biaya_all;
        }

        //SET DEFAULT TOTAL GANGGUAN IF NULL
        if ($total_gangguan == 0) {
            $total_gangguan = 1;
        } else {
            $total_gangguan;
        }

        //SET DEFAULT SUM SLA IF NULL
        if ($sum_sla == 0) {
            $sum_sla = 0;
        } else {
            $sum_sla;
        }

        //CONVERT TO FLOAT
        $sla = (float)$sum_sla;
        // $buaya_bulanan = (float)$sum_biaya;

        //AVERAGE SLA KESELURUHAN PERBULAN
        $avg_sla = $sla / $total_gangguan;
        $avg_sla_format = number_format($avg_sla, 2, '.', '');

        //GET CURRENT MONTH
        $month = date("F", strtotime('m'));

        $data = [
            'title' => 'Daftar Gangguan Bulan ' . $month,
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $total_gangguan,
            'current_gangguan' => $current_gangguan,
            'avg_sla' => $avg_sla_format,
            'month' => $month,
            'sum_denda' => $sum_restitusi,
            'sum_tagihan_bulanan' => $sum_biaya_bulanan,
        ];

        return view('pages/home', $data);
    }

    public function gangguan()
    {
        //GET ID PROVIDER FROM LOGIN
        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        //GET CURRENT GANGGUAN BASED USER PROVIDER OR NOT
        $get_data_all = $this->GangguanModel->getGangguanCurrent();
        $get_data_provider = $this->GangguanModel->getGangguanSelesaiProvider($id_provider);

        //GET TOTAL GANGGUAN BASED USER PROVIDER OR NOT
        $get_total_all = $this->GangguanModel->getTotalGangguan();
        // $total_gangguan = $this->GangguanModel->getTotalGangguanSla();
        $get_total_provider = $this->GangguanModel->getTotalGangguanProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_sla_all = $this->GangguanModel->getJumlahAllSla();
        $sum_sla_provider = $this->GangguanModel->getJumlahAllSlaProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_restitusi_all = $this->GangguanModel->getJumlahRestitusi();
        $sum_restitusi_provider = $this->GangguanModel->getJumlahRestitusiProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_biaya_all = $this->GangguanModel->getJumlahAllBiayaBulanan();
        $sum_biaya_provider = $this->GangguanModel->getJumlahAllBiayaBulananProvider($id_provider);

        //SET DATA IF USER PROVIDER OR NOT
        if ($provider != null) {
            $current_gangguan = $get_data_provider;
            $total_gangguan = $get_total_provider;
            $sum_sla = $sum_sla_provider;
            $sum_restitusi = $sum_restitusi_provider;
            $sum_biaya_bulanan = $sum_biaya_provider;
        } else {
            $current_gangguan = $get_data_all;
            $total_gangguan = $get_total_all;
            $sum_sla = $sum_sla_all;
            $sum_restitusi = $sum_restitusi_all;
            $sum_biaya_bulanan = $sum_biaya_all;
        }

        //SET DEFAULT TOTAL GANGGUAN IF NULL
        if ($total_gangguan == 0) {
            $total_gangguan = 1;
        } else {
            $total_gangguan;
        }

        //SET DEFAULT SUM SLA IF NULL
        if ($sum_sla == 0) {
            $sum_sla = 0;
        } else {
            $sum_sla;
        }

        //CONVERT TO FLOAT
        $sla = (float)$sum_sla;
        // $buaya_bulanan = (float)$sum_biaya;

        //AVERAGE SLA KESELURUHAN PERBULAN
        $avg_sla = $sla / $total_gangguan;
        $avg_sla_format = number_format($avg_sla, 2, '.', '');

        //GET CURRENT MONTH
        $month = date("F", strtotime('m-y'));

        $data = [
            'title' => 'Daftar Gangguan Bulan ' . $month,
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $total_gangguan,
            'current_gangguan' => $current_gangguan,
            'avg_sla' => $avg_sla_format,
            'month' => $month,
            'sum_denda' => $sum_restitusi,
            'sum_tagihan_bulanan' => $sum_biaya_bulanan,
        ];

        return view('pages/gangguan', $data);
    }

    public function restitusi()
    {
        //GET ID PROVIDER FROM LOGIN
        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        //GET CURRENT GANGGUAN BASED USER PROVIDER OR NOT
        $get_data_all = $this->GangguanModel->getGangguanCurrent();
        $get_data_provider = $this->GangguanModel->getGangguanSelesaiProvider($id_provider);

        //GET TOTAL GANGGUAN BASED USER PROVIDER OR NOT
        $get_total_all = $this->GangguanModel->getTotalGangguan();
        // $total_gangguan = $this->GangguanModel->getTotalGangguanSla();
        $get_total_provider = $this->GangguanModel->getTotalGangguanProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_sla_all = $this->GangguanModel->getJumlahAllSla();
        $sum_sla_provider = $this->GangguanModel->getJumlahAllSlaProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_restitusi_all = $this->GangguanModel->getJumlahRestitusi();
        $sum_restitusi_provider = $this->GangguanModel->getJumlahRestitusiProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_biaya_all = $this->GangguanModel->getJumlahAllBiayaBulanan();
        $sum_biaya_provider = $this->GangguanModel->getJumlahAllBiayaBulananProvider($id_provider);

        //SET DATA IF USER PROVIDER OR NOT
        if ($provider != null) {
            $current_gangguan = $get_data_provider;
            $total_gangguan = $get_total_provider;
            $sum_sla = $sum_sla_provider;
            $sum_restitusi = $sum_restitusi_provider;
            $sum_biaya_bulanan = $sum_biaya_provider;
        } else {
            $current_gangguan = $get_data_all;
            $total_gangguan = $get_total_all;
            $sum_sla = $sum_sla_all;
            $sum_restitusi = $sum_restitusi_all;
            $sum_biaya_bulanan = $sum_biaya_all;
        }

        //SET DEFAULT TOTAL GANGGUAN IF NULL
        if ($total_gangguan == 0) {
            $total_gangguan = 1;
        } else {
            $total_gangguan;
        }

        //SET DEFAULT SUM SLA IF NULL
        if ($sum_sla == 0) {
            $sum_sla = 0;
        } else {
            $sum_sla;
        }

        //CONVERT TO FLOAT
        $sla = (float)$sum_sla;
        // $buaya_bulanan = (float)$sum_biaya;

        //AVERAGE SLA KESELURUHAN PERBULAN
        $avg_sla = $sla / $total_gangguan;
        $avg_sla_format = number_format($avg_sla, 2, '.', '');

        //GET CURRENT MONTH
        $month = date("F", strtotime('m'));

        $data = [
            'title' => 'Daftar Restitusi Bulan ' . $month,
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $total_gangguan,
            'current_gangguan' => $current_gangguan,
            'avg_sla' => $avg_sla_format,
            'month' => $month,
            'sum_denda' => $sum_restitusi,
            'sum_tagihan_bulanan' => $sum_biaya_bulanan,
        ];

        return view('pages/restitusi', $data);
    }

    public function tagihan()
    {
        //GET ID PROVIDER FROM LOGIN
        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        //GET CURRENT GANGGUAN BASED USER PROVIDER OR NOT
        $get_data_all = $this->GangguanModel->getGangguanCurrent();
        $get_data_provider = $this->GangguanModel->getGangguanSelesaiProvider($id_provider);

        //GET TOTAL GANGGUAN BASED USER PROVIDER OR NOT
        $get_total_all = $this->GangguanModel->getTotalGangguan();
        // $total_gangguan = $this->GangguanModel->getTotalGangguanSla();
        $get_total_provider = $this->GangguanModel->getTotalGangguanProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_sla_all = $this->GangguanModel->getJumlahAllSla();
        $sum_sla_provider = $this->GangguanModel->getJumlahAllSlaProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_restitusi_all = $this->GangguanModel->getJumlahRestitusi();
        $sum_restitusi_provider = $this->GangguanModel->getJumlahRestitusiProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_biaya_all = $this->GangguanModel->getJumlahAllBiayaBulanan();
        $sum_biaya_provider = $this->GangguanModel->getJumlahAllBiayaBulananProvider($id_provider);

        //SET DATA IF USER PROVIDER OR NOT
        if ($provider != null) {
            $current_gangguan = $get_data_provider;
            $total_gangguan = $get_total_provider;
            $sum_sla = $sum_sla_provider;
            $sum_restitusi = $sum_restitusi_provider;
            $sum_biaya_bulanan = $sum_biaya_provider;
        } else {
            $current_gangguan = $get_data_all;
            $total_gangguan = $get_total_all;
            $sum_sla = $sum_sla_all;
            $sum_restitusi = $sum_restitusi_all;
            $sum_biaya_bulanan = $sum_biaya_all;
        }

        //SET DEFAULT TOTAL GANGGUAN IF NULL
        if ($total_gangguan == 0) {
            $total_gangguan = 1;
        } else {
            $total_gangguan;
        }

        //SET DEFAULT SUM SLA IF NULL
        if ($sum_sla == 0) {
            $sum_sla = 0;
        } else {
            $sum_sla;
        }

        //CONVERT TO FLOAT
        $sla = (float)$sum_sla;
        // $buaya_bulanan = (float)$sum_biaya;

        //AVERAGE SLA KESELURUHAN PERBULAN
        $avg_sla = $sla / $total_gangguan;
        $avg_sla_format = number_format($avg_sla, 2, '.', '');

        //GET CURRENT MONTH
        $month = date("F", strtotime('m-y'));

        $data = [
            'title' => 'Daftar Total Tagihan Bulan ' . $month,
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $total_gangguan,
            'current_gangguan' => $current_gangguan,
            'avg_sla' => $avg_sla_format,
            'month' => $month,
            'sum_denda' => $sum_restitusi,
            'sum_tagihan_bulanan' => $sum_biaya_bulanan,
        ];

        return view('pages/tagihan', $data);
    }

    public function sla()
    {
        //GET ID PROVIDER FROM LOGIN
        $provider = user()->provider;
        $id_provider = 0;
        if ($provider == "Telkom") {
            $id_provider = 1;
        } elseif ($provider == "Tigatra") {
            $id_provider = 2;
        } elseif ($provider == "PrimaLink") {
            $id_provider = 3;
        } elseif ($provider == "LintasArta") {
            $id_provider = 4;
        } elseif ($provider == "IPWAN") {
            $id_provider = 5;
        } elseif ($provider == "BAS") {
            $id_provider = 6;
        } elseif ($provider == "ComNet") {
            $id_provider = 7;
        } elseif ($provider == "IForte") {
            $id_provider = 8;
        } else {
            $id_provider = 9;
        }

        //GET CURRENT GANGGUAN BASED USER PROVIDER OR NOT
        $get_data_all = $this->GangguanModel->getGangguanCurrent();
        $get_data_provider = $this->GangguanModel->getGangguanSelesaiProvider($id_provider);

        //GET TOTAL GANGGUAN BASED USER PROVIDER OR NOT
        $get_total_all = $this->GangguanModel->getTotalGangguan();
        // $total_gangguan = $this->GangguanModel->getTotalGangguanSla();
        $get_total_provider = $this->GangguanModel->getTotalGangguanProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_sla_all = $this->GangguanModel->getJumlahAllSla();
        $sum_sla_provider = $this->GangguanModel->getJumlahAllSlaProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_restitusi_all = $this->GangguanModel->getJumlahRestitusi();
        $sum_restitusi_provider = $this->GangguanModel->getJumlahRestitusiProvider($id_provider);

        //GET JUMLAH TOTAL SLA CONVERT TO FLOAT
        $sum_biaya_all = $this->GangguanModel->getJumlahAllBiayaBulanan();
        $sum_biaya_provider = $this->GangguanModel->getJumlahAllBiayaBulananProvider($id_provider);

        //SET DATA IF USER PROVIDER OR NOT
        if ($provider != null) {
            $current_gangguan = $get_data_provider;
            $total_gangguan = $get_total_provider;
            $sum_sla = $sum_sla_provider;
            $sum_restitusi = $sum_restitusi_provider;
            $sum_biaya_bulanan = $sum_biaya_provider;
        } else {
            $current_gangguan = $get_data_all;
            $total_gangguan = $get_total_all;
            $sum_sla = $sum_sla_all;
            $sum_restitusi = $sum_restitusi_all;
            $sum_biaya_bulanan = $sum_biaya_all;
        }

        //SET DEFAULT TOTAL GANGGUAN IF NULL
        if ($total_gangguan == 0) {
            $total_gangguan = 1;
        } else {
            $total_gangguan;
        }

        //SET DEFAULT SUM SLA IF NULL
        if ($sum_sla == 0) {
            $sum_sla = 0;
        } else {
            $sum_sla;
        }

        //CONVERT TO FLOAT
        $sla = (float)$sum_sla;
        // $buaya_bulanan = (float)$sum_biaya;

        //AVERAGE SLA KESELURUHAN PERBULAN
        $avg_sla = $sla / $total_gangguan;
        $avg_sla_format = number_format($avg_sla, 2, '.', '');

        //GET CURRENT MONTH
        $month = date("F", strtotime('m-y'));

        $data = [
            'title' => 'Daftar SLA Bulan ' . $month,
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation(),
            'total_gangguan' => $total_gangguan,
            'current_gangguan' => $current_gangguan,
            'avg_sla' => $avg_sla_format,
            'month' => $month,
            'sum_denda' => $sum_restitusi,
            'sum_tagihan_bulanan' => $sum_biaya_bulanan,
        ];

        return view('pages/sla', $data);
    }
}
