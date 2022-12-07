<?php

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model
{
    protected $table = 'gangguan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_tiket', 'nama_gangguan', 'id_link', 'detail', 'start', 'end', 'id_status', 'approval', 'keterangan_submit', 'keterangan_reject', 'bukti_submit', 'waktu_submit', 'keterangan_stopclock', 'start_stopclock', 'extra_time_stopclock', 'approval_stopclock', 'ket_reject_stopclock', 'approval_stopclock_spv', 'ket_reject_stopclock_spv', 'offline', 'sla', 'restitusi', 'tagihan_bulanan'];


    public function getGangguan()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            // ->where('gangguan.id_status', '1')
            // ->orWhere('gangguan.id_status', '2')
            // ->where('gangguan.approval', null)
            ->Where('gangguan.approval', null)
            ->orWhere('gangguan.approval', 'NO')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanSelesai()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->where('gangguan.approval', 'YES')
            ->select('gangguan.*')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanSupervisor()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('gangguan.approval_stopclock', 'YES')
            ->where('gangguan.approval_stopclock_spv', null)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getStopClockSupervisor()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('gangguan.approval_stopclock_spv', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getProvider()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.id_provider')
            // ->where('gangguan.approval !=', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('link.id_provider', $id_provider)
            ->where('gangguan.approval', 'NO')
            ->orWhere('gangguan.approval', null)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanSelesaiProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('link.id_provider', $id_provider)
            ->where('gangguan.approval', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getAllWaktuSubmit()
    {
        return $this->db->table('gangguan')
            ->select('waktu_submit')
            ->get()->getResultArray();
    }

    public function getAllWaktuStart()
    {
        return $this->db->table('gangguan')
            ->select('start')
            ->get()->getResultArray();
    }

    public function getWaktuSubmit($id)
    {
        return $this->db->table('gangguan')
            ->select('waktu_submit')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuStart($id)
    {
        return $this->db->table('gangguan')
            ->select('start')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuEnd($id)
    {
        return $this->db->table('gangguan')
            ->select('end')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuExtra($id)
    {
        return $this->db->table('gangguan')
            ->select('extra_time_stopclock')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getBiayaBulanan($id)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('link.biaya_bulanan', 'biaya_bulanan')
            ->where('gangguan.id', $id)
            ->get()->getRow()->biaya_bulanan;
    }

    public function getJumlahGangguan()
    {
        return $this->db->table('gangguan')
            ->countAllResults() + 1;
    }

    public function getTotalGangguan()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->countAllResults();
    }

    public function getTotalGangguanSla()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }

    public function getGangguanCurrent()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->join('branch', 'branch.id=link.id_branch', 'left')
            ->join('jenis_branch', 'jenis_branch.id=branch.id_jenis_branch', 'left')
            // ->select('link.nama_link')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->get()->getResultArray();
    }

    public function getAllSla()
    {
        return  $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link')
            ->select('gangguan.sla')
            ->select('link.biaya_bulanan')
            ->select('gangguan.no_tiket')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getJumlahAllSla()
    {
        return  $this->db->table('gangguan')
            ->selectSum('gangguan.sla', 'sum_sla')
            ->where('MONTH(gangguan.start)', date('m'))
            ->get()->getRow()->sum_sla;
    }

    public function getJumlahAllBiayaBulanan()
    {
        return  $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link')
            ->selectSum('link.biaya_bulanan', 'sum_biaya_bulanan')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->orderBy('gangguan.id')
            ->get()->getRow()->sum_biaya_bulanan;
    }

    public function getBandwidthLink()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.bandwidth')
            ->get()->getResultArray();
    }

    // public function getBiayaBulananLink()
    // {
    //     return $this->db->table('gangguan')
    //         ->join('link', 'link.id=gangguan.id_link', 'left')
    //         ->join('status', 'status.id=gangguan.id_status', 'left')
    //         ->select('link.biaya_bulanan')
    //         ->get()->getResultArray();
    // }
}
