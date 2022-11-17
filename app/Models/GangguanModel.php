<?php 

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model 
{
    protected $table = 'gangguan';
    protected $useTimestamps = true;
    protected $allowedfields = ['nomor_tiket', 'nama_gangguan', 'id_branch', 'id_provider', 'id_regional', 'detail', 'start', 'end', 'status', 'approval'];

public function getGangguan()
{
    return $this->db->table('gangguan');
}
}
