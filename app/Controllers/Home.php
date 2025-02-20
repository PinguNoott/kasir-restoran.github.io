<?php

namespace App\Controllers;

use App\Models\M_oke;
use CodeIgniter\Controller;

class Home extends BaseController
{
     protected $M_oke;

    public function __construct()
    {
        $this->M_oke = new M_oke();
    }

  public function index()
{
    $barangData = $this->M_oke->get_barang_by_kategori('');
    
    // Ambil data setting
    $setting = $this->M_oke->get_setting();

    return view('cart', [
        'barangData' => $barangData,
        'setting' => $setting
    ]);
}
public function daftartugas()
{
    $model = new M_oke();
    $data['tugas'] = $model->getTugas();

    echo view('header');
    echo view('menu');
    echo view('daftartugas', $data);
    echo view('footer');
}

public function updatestatus()
{
    $model = new M_oke();
    
    $id_tugas = $this->request->getPost('id_tugas');
    $status = $this->request->getPost('status');

    $model->updateTugasStatus($id_tugas, $status);

    return redirect()->to(base_url('home/daftartugas'));
}

public function dashboard()
{
    if (session()->get('level') > 0) {
        $data['setting'] = $this->M_oke->get_setting();
        $data['logActivity'] = $this->M_oke->getLogActivity();

        // Ambil jumlah tugas
        $data['totalTugas'] = $this->M_oke->totalTugas();
        $data['selesai'] = $this->M_oke->tugasSelesai();
        $data['belumSelesai'] = $this->M_oke->tugasBelumSelesai();

        echo view('header', $data);
        echo view('menu', $data);
        echo view('dashboard', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/login');
    }
}



public function setting()
{
    // Ambil data setting dari database
     $model = new M_oke();
    $data['setting'] = $this->M_oke->get_setting();
$model->logActivity(session()->get('id_user'), 'Edit Website', 'Website ' . $username . ' telah diedit.');
    // Debug: Cek apakah data setting benar-benar ada
    if (empty($data['setting'])) {
        return redirect()->to('home/dashboard')->with('error', 'Data setting tidak ditemukan!');
    }
    return view('setting', $data);
}

public function update_setting()
{
    // Validasi input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'judul_website' => 'required',
        'logo_website'  => 'is_image[logo_website]|mime_in[logo_website,image/png,image/jpeg]|max_size[logo_website,2048]',
        'logo_login'    => 'is_image[logo_login]|mime_in[logo_login,image/png,image/jpeg]|max_size[logo_login,2048]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->to('home/setting')->with('error', 'Format gambar salah atau ukuran terlalu besar!');
    }

    // Ambil data lama
    $oldSetting = $this->M_oke->get_setting();

    $data = [
        'judul_website' => $this->request->getPost('judul_website'),
        'logo_website' => $oldSetting['logo_website'], // Default tetap gambar lama
        'logo_login' => $oldSetting['logo_login'] // Default tetap gambar lama
    ];

    // Pastikan folder images/ tersedia
    if (!is_dir('images/')) {
        mkdir('images/', 0777, true);
    }

    // Handle upload logo website
    $fileLogoWebsite = $this->request->getFile('logo_website');
    if ($fileLogoWebsite->isValid() && !$fileLogoWebsite->hasMoved()) {
        $newLogoWebsite = $fileLogoWebsite->getRandomName();
        $fileLogoWebsite->move('images/', $newLogoWebsite);
        $data['logo_website'] = 'images/' . $newLogoWebsite;
    }

    // Handle upload logo login
    $fileLogoLogin = $this->request->getFile('logo_login');
    if ($fileLogoLogin->isValid() && !$fileLogoLogin->hasMoved()) {
        $newLogoLogin = $fileLogoLogin->getRandomName();
        $fileLogoLogin->move('images/', $newLogoLogin);
        $data['logo_login'] = 'images/' . $newLogoLogin;
    }

    // Simpan perubahan ke database
    $this->M_oke->update_setting($data);

    return redirect()->to('home/setting')->with('success', 'Pengaturan berhasil diperbarui!');
}

 public function login()
{
    $data['setting'] = $this->M_oke->get_setting(); // Ambil pengaturan dari database
    return view('login', $data); // Kirim data ke view login
}

   public function aksilogin()
{
    $model = new M_oke();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $model->where(['username' => $username, 'password' => $password])->first();

    if ($user) {
        $session = session();
        $session->set([
            'id_user' => $user->id_user,   // Ubah dari $user['id_user'] ke $user->id_user
            'username' => $user->username,
            'level' => $user->level, 
            'logged_in' => true
        ]);

        // **Tambahkan Log**
        $model->logActivity($user->id_user, 'Login', 'User ' . $username . ' berhasil login.');

        return redirect()->to('home/dashboard');
    } else {
        return redirect()->to('home/login')->with('error', 'Username atau Password salah');
    }
}

     public function logout()
    {
         $model = new M_oke();
        session()->destroy();
         // **Tambahkan Log**
    $model->logActivity(session()->get('id_user'), 'Logout', 'User logout.');

        return redirect()->to('home/login');
    }
        public function signup(){

    echo view('signup');
}

public function aksi_signup()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password'); 

    // Validasi input
    if (empty($username) || empty($password)) {
        return redirect()->to('home/signup')->with('error', 'All fields are required.');
    }

    // Pastikan password hanya berupa angka (integer)
    if (!ctype_digit($password)) {
        return redirect()->to('home/signup')->with('error', 'Password must be a number.');
    }

    $model = new M_oke();

    // Cek apakah username atau email sudah ada
    $existingUser = $model->where('username', $username)
                          ->first();

    if ($existingUser) {
        return redirect()->to('home/signup')->with('error', 'Username or email already exists.');
    }

    // Set level to 1 by default (regular user)
    $level = 1;

    // Data baru untuk disimpan ke database
    $newUser = [
        "username" => $username,
        "password" => (int)$password, // Simpan password sebagai angka
        "level" => $level 
    ];

    // Simpan ke database
    if ($model->insert($newUser)) {
        return redirect()->to('home/login')->with('success', 'Account successfully created. Please login.');
    } else {
        return redirect()->to('home/signup')->with('error', 'Failed to create account. Please try again.');
    }
}

    public function user()
    {
        if (session()->get('level') > 0) {
            $model = new M_oke();
            $data['setting'] = $model->get_setting();
            $data['desta'] = $model->findAll();

            echo view('header', $data);
            echo view('menu', $data);
            echo view('user', $data);
            echo view('footer', $data);
        } else {
            return redirect()->to('home/login');
        }
    }

    public function tambahuser()
    {
        if (session()->get('level') > 0) {
            $model = new M_oke();
            $data['setting'] = $model->get_setting();
            echo view('header', $data);
            echo view('menu', $data);
            echo view('tambahuser', $data);
            echo view('footer', $data);
        } else {
            return redirect()->to('home/login');
        }
    }

    public function edituser($id)
    {
        if (session()->get('level') > 0) {
            $model = new M_oke();
            $where = array('id_user' => $id);
            $data['a'] = $model->getwhere('user', $where);
            $data['setting'] = $model->get_setting();

            echo view('header', $data);
            echo view('menu', $data);
            echo view('edituser', $data);
            echo view('footer', $data);
        } else {
            return redirect()->to('home/login');
        }
    }

    public function aksi_t_user()
    {
        $model = new M_oke();
        $username = $this->request->getPost('nama');
       $password = $this->request->getPost('password'); 
        $level = $this->request->getPost('level');

        $foto = null;
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $foto = $fotoFile->getRandomName();
            $fotoFile->move('images', $foto);
        }

        $data = [
            'username' => $username,
            'password' => $password,
            'level' => $level,
            'foto' => $foto
        ];

        $model->tambah('user', $data);
        $model->logActivity(session()->get('id_user'), 'Tambah User', 'User ' . $username . ' ditambahkan.');
        return redirect()->to('home/user')->with('success', 'User berhasil ditambahkan!');
    }

    public function aksi_e_user()
{
    $model = new M_oke();
    $id = $this->request->getPost('id');
    $username = $this->request->getPost('nama');
    $password = $this->request->getPost('password');
    $level = $this->request->getPost('level');

    // Perbaikan: Menggunakan -> karena userLama adalah objek
    $userLama = $model->find($id);
    $foto = $userLama->foto;  

    $file = $this->request->getFile('foto');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newFileName = $file->getRandomName();
        $file->move('images', $newFileName);

        // Hapus foto lama jika ada
        if (!empty($userLama->foto) && file_exists('images/' . $userLama->foto)) {
            unlink('images/' . $userLama->foto);
        }

        $foto = $newFileName;
    }

    $data = [
        'username' => $username,
        'password' => $password,
        'level' => $level,
        'foto' => $foto
    ];

    $model->update($id, $data);
    $model->logActivity(session()->get('id_user'), 'Edit User', 'User ' . $username . ' telah diedit.');
    return redirect()->to('home/user')->with('success', 'Profil berhasil diperbarui!');
}

    public function hapususer($id)
    {
        $model = new M_oke();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/home/user')->with('error', 'User tidak ditemukan!');
        }

        if (!empty($user->foto) && file_exists('images/' . $user->foto)) {
    unlink('images/' . $user->foto);
}


        $model->delete($id);
        $model->logActivity(session()->get('id_user'), 'Hapus User', 'User ' . $user->username . ' telah dihapus.');
        return redirect()->to('/home/user')->with('success', 'User berhasil dihapus!');
    }

public function tugas()
{
    if (session()->get('level') > 0) {
        $model = new M_oke();
        $data['setting'] = $model->get_setting();

        // Ambil parameter pencarian dari input form
        $keyword = $this->request->getGet('keyword');
        
        // Jika ada pencarian, gunakan method cariTugas(), jika tidak ambil semua
        if ($keyword) {
            $data['desta'] = $model->cariTugas($keyword);
        } else {
            $data['desta'] = $model->getTugas();
        }

        echo view('header', $data);
        echo view('menu', $data);
        echo view('tugas', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/login');
    }
}

public function ajaxCariTugas()
{
    $model = new M_oke();
    $keyword = $this->request->getGet('keyword');

    // Jika keyword kosong, tampilkan semua data
    if (!$keyword) {
        $tugas = $model->getTugas();
    } else {
        $tugas = $model->cariTugas($keyword);
    }

    // Kirim data dalam format JSON
    return $this->response->setJSON($tugas);
}


    public function tambahtugas()
    {
        if (session()->get('level') > 0) {
            $model = new M_oke();
            $data['setting'] = $model->get_setting();
            echo view('header', $data);
            echo view('menu', $data);
            echo view('tambahtugas', $data);
            echo view('footer', $data);
        } else {
            return redirect()->to('home/login');
        }
    }

    public function edittugas($id)
    {
        if (session()->get('level') > 0) {
            $model = new M_oke();
            $where = array('id_tugas' => $id);
            $data['a'] = $model->getwhere('tugas', $where);
            $data['setting'] = $model->get_setting();

            echo view('header', $data);
            echo view('menu', $data);
            echo view('edittugas', $data);
            echo view('footer', $data);
        } else {
            return redirect()->to('home/login');
        }
    }

    public function aksi_t_tugas()
    {
        $model = new M_oke();
        $nama_tugas = $this->request->getPost('nama_tugas');
        $prioritas = $this->request->getPost('prioritas');
        $status = $this->request->getPost('status');
        $tanggal = $this->request->getPost('tanggal');

        $data = [
            'nama_tugas' => $nama_tugas,
            'prioritas' => $prioritas,
            'status' => $status,
            'tanggal' => $tanggal
        ];

        $model->tambah('tugas', $data);
        $model->logActivity(session()->get('id_user'), 'Tambah Tugas', 'Tugas ' . $nama_tugas . ' ditambahkan.');
        return redirect()->to('home/tugas')->with('success', 'Tugas berhasil ditambahkan!');
    }
public function aksi_e_tugas()
{
    $model = new M_oke();
    $id = $this->request->getPost('id_tugas');
    $nama_tugas = $this->request->getPost('nama_tugas');
    $prioritas = $this->request->getPost('prioritas');
    $status = $this->request->getPost('status');
    $tanggal = $this->request->getPost('tanggal');

    $data = [
        'nama_tugas' => $nama_tugas,
        'prioritas' => $prioritas,
        'status' => $status,
        'tanggal' => $tanggal
    ];

    // Pakai method edit() agar update ke tabel 'tugas'
   $model->edit('tugas', $data, ['id_tugas' => $id]);

    $model->logActivity(session()->get('id_user'), 'Edit Tugas', 'Tugas ' . $nama_tugas . ' telah diedit.');
    return redirect()->to('home/tugas')->with('success', 'Tugas berhasil diperbarui!');
}
public function hapustugas($id_tugas)
{
    $model = new M_oke();
    $model->db->table('tugas')->where('id_tugas', $id_tugas)->delete();

    // Ambil parameter filter yang sebelumnya digunakan
    $keyword = $this->request->getGet('keyword');

    // Redirect kembali ke halaman tugas dengan filter yang sama
    return redirect()->to(base_url('home/tugas') . '?keyword=' . urlencode($keyword));
}

public function profil($id = null)
{
    if (session()->get('level') > 0) {
        if ($id === null) {
            $id = session()->get('id_user'); // Gunakan ID dari sesi jika tidak ada
        }

        $model = new M_oke();
        $where = ['id_user' => $id];
        $data['a'] = $model->where($where)->get()->getRow(); // Perbaikan kode
 $model->logActivity(session()->get('id_user'), 'Edit Profil', 'Profil ' . $username . ' telah diedit.');
        echo view('header');
        echo view('profil', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}
public function aksi_e_profil()
{
    $id = $this->request->getPost('id');
    $username = $this->request->getPost('nama');
    $password = $this->request->getPost('password');

    $model = new M_oke();
    $userLama = $model->find($id); // Ambil data user lama berdasarkan ID

    if (!$userLama) {
        return redirect()->to(base_url('home/user'))->with('error', 'User tidak ditemukan!');
    }

    $fotoLama = $this->request->getPost('foto_lama');
    $foto = $fotoLama; // Default pakai foto lama

    $file = $this->request->getFile('foto');
    if ($file->isValid() && !$file->hasMoved()) {
        $newFileName = $file->getRandomName();
        $file->move('images', $newFileName);

        // 🔴 **PERBAIKI DI SINI** 🔴
        if (!empty($userLama->foto) && file_exists('images/' . $userLama->foto)) {
            unlink('images/' . $userLama->foto);
        }

        $foto = $newFileName;
    }

    $data = [
        'username' => $username,
        'password' => $password,
        'foto' => $foto,
    ];

    $updateStatus = $model->update2($id, $data);

    if (!$updateStatus) {
        return redirect()->to(base_url('home/user'))->with('error', 'Gagal memperbarui profil!');
    }

    return redirect()->to(base_url('home/user'))->with('success', 'Profil berhasil diperbarui!');
}


public function logactivity()
{
    if (session()->get('level') > 0) {
        $data['setting'] = $this->M_oke->get_setting();
        $data['logActivity'] = $this->M_oke->getLogActivity(); // Ambil log aktivitas

        echo view('header', $data);
        echo view('menu', $data);
        echo view('log', $data); // Tampilkan log activity di view log.php
        echo view('footer', $data);
    } else {
        return redirect()->to('home/login');
    }
}
public function clearLog()
{
    if (session()->get('level') > 0) { // Pastikan user memiliki akses
        $this->M_oke->clearLogActivity(); // Panggil model untuk menghapus log
        return redirect()->to('home/logactivity')->with('success', 'Log aktivitas berhasil dihapus!');
    } else {
        return redirect()->to('home/login');
    }
}

}