<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'username', 'fullname', 'password_hash', 'no_hp', 'alamat', 'provider', 'user_image', 'hak_akses'];

    public function getPengguna($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getPenggunaProvider()
    {
        return $this->db->table('users')
            ->select('users.*')
            ->where('users.provider !=', null)
            ->orderBy('users.id')
            ->get()->getResultArray();
    }
}
