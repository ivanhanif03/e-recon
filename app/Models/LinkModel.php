<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $table = 'link';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama_link', 'id_branch', 'id_provider', 'id_pic',  'bandwidth', 'jenis_link', 'biaya_bulanan'];

    public function getLink()
    {
        return $this->db->table('link')
            ->join('branch', 'branch.id=link.id_branch', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->join('users', 'users.id=link.id_pic', 'left')
            ->select('branch.nama_branch')
            ->select('provider.nama_provider')
            ->select('users.fullname')
            ->select('link.*')
            ->orderBy('link.id')
            ->get()->getResultArray();
    }
}
