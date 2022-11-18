<?php 

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model 
{
    protected $table = 'status';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kategori'];

    public function getStatus()
    {
        return $this->db->table('status')
        ->get()->getResultArray();  
    }
}