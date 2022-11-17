<?php 

namespace App\Models;

use CodeIgniter\Model;

class JenisBranchModel extends Model 
{
    protected $table = 'jenis_branch';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'jenis_branch'];

    public function getJenisBranch()
    {
         return $this->db->table('jenis_branch')
         ->get()->getResultArray();  
    }
}