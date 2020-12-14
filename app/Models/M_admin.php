<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table = 'tb_akun';
    protected $primaryKey = 'id_akun';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'email', 'password', 'foto', 'role_id', 'is_active'];


    public function getAkun($email)
    {
        $this->join('tb_role', 'tb_akun.role_id=tb_role.id');
        return $this->where(['email' => $email])->first();
    }



    public function getAdmin($id_akun = false)
    {
        if ($id_akun == false) {
            $this->orderBy('id_akun', 'DESC');
            $this->where(['role_id' => 2]);
            return $this->findAll();
        }

        return $this->where(['id_akun' => $id_akun])->first();
    }

    public function getGambar()
    {
        return $this->db->table('tb_gambar')->get()->getResultArray();
    }

    public function getGambar_byId($id)
    {
        return $this->db->table('tb_gambar')->where('id', $id)->get()->getRowArray();
    }

    // GUEST
    public function getUser($id_akun = false)
    {
        if ($id_akun == false) {
            $this->orderBy('id_akun', 'DESC');
            $this->where(['role_id' => 3]);
            return $this->findAll();
        } else {
            return $this->getWhere(['id_akun' => $id_akun]);
        }
    }
}
