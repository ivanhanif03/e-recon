<?php 

namespace App\Models;

use CodeIgniter\Model;

class KlasifikasiBranchModel extends Model 
{
    protected $table = 'klasifikasibranch';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama_klasifikasi'];

    public function getKlasifikasiBranch()
    {
        return $this->db->table('klasifikasibranch')
        ->get()->getResultArray();  
    }
}