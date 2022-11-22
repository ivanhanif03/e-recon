<?php 

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model 
{
    protected $table = 'auth_groups';
    protected $useTimestamps = true;
}