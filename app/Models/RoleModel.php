<?php 

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model 
{
    protected $table = 'provider';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama', 'pic,', 'no_hp', 'alamat'];

    public function getProvider()
    {
         return $this->db->table('provider')
         ->join('auth_groups','auth_groups.id=auth_groups_users.group_id')
         ->join('users', 'users.id=auth_groups_users.user_id')
         ->get()->getResultArray();  
    }
}