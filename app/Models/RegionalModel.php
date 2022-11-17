<?php 

namespace App\Models;

use CodeIgniter\Model;

class RegionalModel extends Model 
{
    protected $table = 'regional';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kode_regional', 'nama_regional'];

    public function getRegional()
    {
        return $this->db->table('regional')
        ->get()->getResultArray();  
    }
}