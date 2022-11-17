<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model 
{
    protected $table = 'provider';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama', 'pic,', 'no_hp', 'alamat'];

    public function getProvider()
    {
        return $this->db->table('provider')
        ->get()->getResultArray();  
    }
}