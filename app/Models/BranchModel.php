<?php 

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model 
{
    protected $table = 'branch';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kode_branch', 'nama_branch', 'alamat', 'no_telp', 'id_regional', 'id_jenis_branch', 'id_klasifikasi_branch'];

    public function getBranchAll()
    {
        return $this->db->table('branch')
        ->join('regional','regional.id=branch.id_regional', 'left')
        ->join('jenis_branch', 'jenis_branch.id=branch.id_jenis_branch', 'left')
        ->join('klasifikasi_branch', 'klasifikasi_branch.id=branch.id_klasifikasi_branch', 'left')
        ->select('regional.nama_regional')
        ->select('jenis_branch.jenis_branch')
        ->select('klasifikasi_branch.nama_klasifikasi')
        ->select('branch.*')
        ->orderBy('branch.id')
        ->get()->getResultArray();  
   }
}