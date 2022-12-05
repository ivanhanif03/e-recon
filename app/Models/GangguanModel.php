<?php

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model
{
    protected $table = 'gangguan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_tiket', 'nama_gangguan', 'id_link', 'detail', 'start', 'end', 'id_status', 'approval', 'keterangan_submit', 'keterangan_reject', 'bukti_submit', 'waktu_submit', 'keterangan_stopclock', 'start_stopclock', 'extra_time_stopclock', 'approval_stopclock', 'ket_reject_stopclock', 'approval_stopclock_spv', 'ket_reject_stopclock_spv', 'offline', 'sla'];


    public function getGangguan()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('gangguan.approval', null)
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
            ->where('gangguan.approval_stopclock_spv !=', 'YES')
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
            // ->where('gangguan.approval !=', 'YES')
            ->where('link.id_provider', $id_provider)
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

    public function getJumlahGangguan()
    {
        return $this->db->table('gangguan')
            ->countAllResults() + 1;
    }
}
