<?php 

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model 
{
    protected $table = 'branch';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kode_branch', 'nama_branch', 'alamat', 'no_telp', 'id_regional', 'id_provider', 'id_jenis_branch', 'id_klasifikasi_branch'];

    public function getBranch()
    {
         return $this->db->table('branch')
         ->join('provider','provider.id=branch.id_provider')
         ->join('regional', 'regional.id=branch.id_regional')
         ->join('jenisbranch', 'jenisbranch.id=branch.id_jenis_branch')
         ->join('klasifikasibranch', 'klasifikasibranch.id=branch.id_klasifikasi_branch')
         ->get()->getResultArray();  
    }
}