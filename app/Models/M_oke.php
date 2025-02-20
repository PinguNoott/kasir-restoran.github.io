<?php

namespace App\Models;

use CodeIgniter\Model;

class M_oke extends Model
{
    // Default table
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'no_telp', 'level', 'foto'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
   protected $returnType = 'object';

public function tugas()
{
    $this->table = 'tugas'; 
    $this->primaryKey = 'id_tugas'; 
    $this->allowedFields = ['nama_tugas', 'prioritas', 'status', 'tanggal'];
    return $this;
}

public function setting()
    {
        $this->table = 'setting';
        $this->primaryKey = 'id_setting';
        $this->allowedFields = ['judul_website', 'logo_website', 'logo_login'];
        return $this;
    }
    public function totalTugas()
{
    return $this->db->table('tugas')->countAllResults();
}

public function tugasSelesai()
{
    return $this->db->table('tugas')->where('status', 'Selesai')->countAllResults();
}

public function tugasBelumSelesai()
{
    return $this->db->table('tugas')->where('status !=', 'Selesai')->countAllResults();
}

public function cariTugas($keyword)
{
    return $this->db->table('tugas')
                    ->like('nama_tugas', $keyword)
                    ->get()
                    ->getResult();
}

public function updateTugasStatus($id, $status)
{
    return $this->db->table('tugas')->where('id_tugas', $id)->update(['status' => $status]);
}

public function tampil_satu($table, $where)
{
    return $this->db->table($table)->where($where)->get()->getRow();
}

public function update_data($table, $where, $data)
{
    return $this->db->table($table)->where($where)->update($data);
}

    public function tampil($tabel)
    {
        return $this->db
                    ->table($tabel)
                    ->get()
                    ->getResult();
    }

    public function edit($tabel, $data, $where)
    {
        return $this->db
                    ->table($tabel)
                    ->update($data,$where);
    }

   public function getwhere($tabel, $where)
{
    $query = $this->db->table($tabel)->getWhere($where);
    
    if (!$query) {
        return false; // Kembalikan false jika query gagal
    }

    return $query->getRow();
}

    public function tambah($tabel, $data)
    {
        return $this->db
                    ->table($tabel)
                    ->insert($data);
    }

    public function hapus($tabel, $where)
    {
        return $this->db
                    ->table($tabel)
                    ->delete($where);
    }

public function getTugas()
{
    return $this->db->table('tugas')->get()->getResult();
}

    public function logActivity($id_user, $aksi, $deskripsi)
{
    $this->db->table('log_activity')->insert([
        'id_user' => $id_user,
        'aksi' => $aksi,
        'deskripsi' => $deskripsi
    ]);
}

public function getLogActivity()
{
    return $this->db->table('log_activity')
                    ->orderBy('timestamp', 'DESC') // Urutkan berdasarkan waktu terbaru
                    ->get()
                    ->getResultArray();
}
public function clearLogActivity()
{
    return $this->db->table('log_activity')->truncate();
}

public function get_setting()
{
    return $this->db->table('setting')->get()->getRowArray(); // Pastikan tabel benar
}

public function update_setting($data)
{
    return $this->db->table('setting')->update($data);
}
public function update2($id = null, $data = null): bool
    {
        return $this->db->table('user')->update($data, ['id_user' => $id]);
    }

}
