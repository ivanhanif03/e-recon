<?php 

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model 
{
    protected $table = 'gangguan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nomor_tiket', 'nama_gangguan', 'id_link', 'detail', 'start', 'end', 'id_status', 'approval'];

    public function getGangguan()
    {
         return $this->db->table('gangguan')
         ->join('link','link.id=gangguan.id_link')
         ->join('status', 'status.id=gangguan.id_status')
         ->get()->getResultArray();  
    }
}