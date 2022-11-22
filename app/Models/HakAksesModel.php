<?php 

namespace App\Models;

use CodeIgniter\Model;

class HakAksesModel extends Model 
{
    protected $table = 'auth_groups_users';
    protected $useTimestamps = false;
    protected $allowedFields = ['group_id', 'user_id'];

    public function getHakAkses()
    {
         return $this->db->table('auth_groups_users')
         ->join('auth_groups','auth_groups.id=auth_groups_users.group_id')
         ->join('users', 'users.id=auth_groups_users.user_id')
         ->get()->getResultArray();  
    }
}