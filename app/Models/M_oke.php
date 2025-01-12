<?php

namespace App\Models;

use CodeIgniter\Model;

class M_oke extends Model
{
    protected $table = 'user'; 
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username', 'password', 'no_telp', 'email', 'level',
        'judul_pengumuman', 'isi_pengumuman', 'target_role', 'metode_pengiriman', 'created_at'
    ];
    protected $useTimestamps = false;

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
                    ->update($data, $where); 
    }

    public function getwhere($tabel, $where)
    {
        return $this->db
                    ->table($tabel)
                    ->getWhere($where)
                    ->getRow();
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

 public function savePengumuman($judul, $isi, $target_role, $metode)
{
    if (empty($judul) || empty($isi) || empty($target_role) || empty($metode)) {
        throw new \Exception('Semua field wajib diisi.');
    }

    log_message('debug', 'Menyimpan pengumuman: ' . json_encode([
        'judul' => $judul,
        'isi' => $isi,
        'target_role' => $target_role,
        'metode' => $metode
    ]));

    $data = [
        'judul_pengumuman' => $judul,
        'isi_pengumuman' => $isi,
        'target_role' => $target_role,
        'metode_pengiriman' => is_array($metode) ? implode(',', $metode) : $metode,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    if (!$this->insert($data)) {
        log_message('error', 'Gagal menyimpan pengumuman: ' . json_encode($data));
        throw new \Exception('Gagal menyimpan pengumuman.');
    }

    $pengumuman_id = $this->insertID();
    
    // Log pengumuman ke tabel pengumuman_logs
    $this->logPengumuman($pengumuman_id, $user_id, $metode, true);  // Asumsi pengumuman berhasil
    return $pengumuman_id;
}

 public function getUsersByRole($role)
{
    // Jika target adalah "semua", ambil semua pengguna
    if ($role == 'semua') {
        return $this->db->table('user')->get()->getResult();
    }

    // Jika target spesifik (seperti "siswa"), filter berdasarkan level
    return $this->db->table('user')->where('level', $role)->get()->getResult();
}

    public function logPengumuman($pengumuman_id, $user_id, $metode, $status)
    {
        $data = [
            'id_pengumuman' => $pengumuman_id,
            'id_user' => $user_id,
            'metode' => $metode,
            'status' => $status ? 'success' : 'failed',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('pengumuman_logs')->insert($data);
    }
}
