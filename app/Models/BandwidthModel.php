<?php

namespace App\Models;

use CodeIgniter\Model;

class BandwidthModel extends Model
{
    protected $table = 'bandwidth';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'bandwidth', 'harga'];

    public function getBandwidth()
    {
        return $this->db->table('bandwidth')
            ->get()->getResultArray();
    }
}
