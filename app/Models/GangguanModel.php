<?php 

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model 
{
    protected $table = 'gangguan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nomor_tiket', 'nama_gangguan', 'id_branch', 'id_provider', 'id_regional', 'detail', 'start', 'end', 'status', 'approval'];

    public function getJenisBranch()
    {
         return $this->db->table('gangguan')
         ->join('provider','provider.id=gangguan.id_provider')
         ->join('branch', 'branch.id=gangguan.id_branch')
         ->join('regional', 'regional.id=gangguan.id_regional')
         ->get()->getResultArray();  
    }
}