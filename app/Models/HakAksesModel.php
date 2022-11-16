<?php 

namespace App\Models;

use CodeIgniter\Model;

class HakAksesModel extends Model 
{
    protected $table = 'auth_groups_users';
    protected $useTimestamps = true;
    protected $allowedFields = ['group_id', 'user_id'];
}