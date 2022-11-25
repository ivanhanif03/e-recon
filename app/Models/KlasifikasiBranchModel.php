<?php 

namespace App\Models;

use CodeIgniter\Model;

class KlasifikasiBranchModel extends Model 
{
    protected $table = 'klasifikasi_branch';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama_klasifikasi'];

    public function getKlasifikasiBranch()
    {
        return $this->db->table('klasifikasi_branch')
        ->get()->getResultArray();  
    }
}