<?php 

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model 
{
    protected $table = 'gangguan';
    protected $useTimestamps = true;
<<<<<<< HEAD
    protected $allowedfields = ['nomor_tiket', 'nama_gangguan', 'id_branch', 'id_provider', 'id_regional', 'detail', 'start', 'end', 'status', 'approval'];

public function getGangguan()
{
    return $this->db->table('gangguan');
}
}
=======
    protected $allowedfields = [
        'provider',
        'outlet',
        'PIC',
        'alamat',
    ];
}
>>>>>>> 5ee6bde51968e1d3bac455ba497dd67393e49c71
