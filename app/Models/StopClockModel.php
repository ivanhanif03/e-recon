<?php

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model
{
    protected $table = 'stopclock';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_gangguan', 'keterangan_stopclock', 'start_pause', 'dateline'];


    public function getGangguan()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            // ->where('gangguan.approval !=', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getProvider()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.id_provider')
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



    public function getWaktuSubmit($id)
    {
        return $this->db->table('gangguan')
            ->select('waktu_submit')
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

    public function getJumlahGangguan()
    {
        return $this->db->table('gangguan')
            ->countAllResults() + 1;
    }
}
