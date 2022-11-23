<?php 

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model 
{
    protected $table = 'branch';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kode_branch', 'nama_branch', 'alamat', 'no_telp', 'id_regional', 'id_provider', 'id_jenis_branch', 'id_klasifikasi_branch'];

    public $providers = [];

    public function getProviders()
    {
        $providers = $this->db->table('provider')
        ->get()->getResultArray();
    }

    public function getBranch()
    {
           
    }
}