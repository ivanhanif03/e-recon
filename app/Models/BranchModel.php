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
         ->join('auth_groups','auth_groups.id=auth_groups_users.group_id')
         ->join('users', 'users.id=auth_groups_users.user_id')
         ->get()->getResultArray();  
    }
}