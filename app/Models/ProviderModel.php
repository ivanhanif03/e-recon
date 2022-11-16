<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model 
{
    protected $table = 'provider';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'pic,', 'no_hp', 'alamat'];
}