<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model 
{
    protected $table = 'provider';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','kode_provider', 'nama_provider', 'alamat'];

    public function getProvider()
    {
        return $this->db->table('provider')
        ->get()->getResultArray();  
    }
}