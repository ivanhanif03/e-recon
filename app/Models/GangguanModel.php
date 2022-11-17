<?php 

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model 
{
    protected $table = 'gangguan';
    protected $useTimestamps = true;
    protected $allowedfields = [
        'provider',
        'outlet',
        'PIC',
        'alamat',
    ];
}