<?php

namespace App\Controllers;

use App\Models\M_oke;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Home extends BaseController
{
  
   public function dashboard()
{
   if (session()->get('level') > 0) {
   	
        $model = new M_oke();
      
        echo view('header');
        echo view('menu');
        echo view('dashboard'); 
        echo view('footer');

}else{
            return redirect()->to('home/login');
        } 
    } 
     public function login()
    {
        echo view('login');
    }

   public function aksilogin()
{
    $model = new M_oke();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    if (empty($username) || empty($password)) {
        return redirect()->to('home/login')->with('error', 'Username dan Password wajib diisi');
    }

    $user = $model->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
        $session = session();
        $session->set([
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'level' => $user['level'],
            'logged_in' => true,
        ]);

        return redirect()->to('home/dashboard');
    } else {
        return redirect()->to('home/login')->with('error', 'Username atau Password salah');
    }
}


     public function logout()
    {
        session()->destroy();
        return redirect()->to('home/login');
    }
        public function signup(){

    echo view('signup');
}

public function aksi_signup()
{
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $no_telp = $this->request->getPost('no_telp');
    $password = $this->request->getPost('password');
    $level = $this->request->getPost('level') ?? 2;

    if (empty($username) || empty($password) || empty($email)) {
        return redirect()->to('home/signup')->with('error', 'Semua field wajib diisi.');
    }

    $model = new M_oke();

    $existingUser = $model->where('username', $username)
                          ->orWhere('email', $email)
                          ->first();

    if ($existingUser) {
        return redirect()->to('home/signup')->with('error', 'Username atau email sudah terdaftar.');
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = [
        'username' => $username,
        'no_telp' => $no_telp,
        'password' => $hashedPassword,
        'email' => $email,
        'level' => $level,
    ];

    if ($model->insert($newUser)) {
        return redirect()->to('home/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    } else {
        return redirect()->to('home/signup')->with('error', 'Gagal membuat akun. Silakan coba lagi.');
    }
}

public function user()
{
    if (session()->get('level')>0) {
    $model = new M_oke();
    $data['desta'] = $model->tampil('user');

    echo view('header');
    echo view('menu');
    echo view('user', $data);
    echo view('footer');
}else{
            return redirect()->to('home/login');
        } 
    }

public function tambahuser()
{
    if (session()->get('level')>0) {
    echo view('header');
    echo view('tambahuser');
    echo view('footer');
}else{
            return redirect()->to('home/login');
        } 
    }

public function edituser($id)
{
    if (session()->get('level')>0) {
    $model = new M_oke();
    $where = array('id_user' => $id);
    $data['a'] = $model->getwhere('user', $where);

    echo view('header');
    echo view('edituser', $data);
    echo view('footer');
}else{
            return redirect()->to('home/login');
        } 
    }

public function hapususer($id)
{
    if (session()->get('level')>0) {
    $model = new M_oke();
    $where = array('id_user' => $id);
    $model->hapus('user', $where);
    return redirect()->to('home/user');
}else{
            return redirect()->to('home/login');
        } 
    }
public function hapuslog($id)
{
    $model = new M_oke();
    $where = array('id_log' => $id);
    $result = $model->hapus('pengumuman_logs', $where);

    if ($result) {
        return redirect()->to('home/log')->with('success', 'Log pengumuman berhasil dihapus.');
    } else {
        return redirect()->to('home/log')->with('error', 'Terjadi kesalahan saat menghapus log pengumuman.');
    }
}

public function aksi_t_user()
{

        $data = array(
            'username' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('pass'),
            'no_telp' => $this->request->getPost('telp'),
            'level' => $this->request->getPost('level')
        );

        $model = new M_oke();
    $model->tambah('user', $data);  
    return redirect()->to('home/user');
}

public function aksi_e_user()
{
    $model = new M_oke();
    $a = $this->request->getPost('nama'); 
    $b = $this->request->getPost('email');
    $c = $this->request->getPost('pass');
    $d = $this->request->getPost('telp');
    $e = $this->request->getPost('level');
    $id = $this->request->getPost('id');
    
    $data = array(
        'username' => $a,
        'email' => $b,
        'password' => $c,
        'no_telp' => $d,
        'level' => $e
       
    );

    $where = array('id_user' => $id);
    $model->edit('user', $data, $where);
    return redirect()->to('home/user');
}

public function log()
{
    if (session()->get('level')>0) {
    $model = new M_oke();
    $data['pengumuman'] = $model->tampil('pengumuman');

    echo view('header');
    echo view('menu');
    echo view('log', $data);
    echo view('footer');
}else{
            return redirect()->to('home/login');
        } 
    }

public function pengumuman()
{
    if (session()->get('level')>0) {
    $model = new M_oke();
    $data['pengumuman'] = $model->tampil('pengumuman');

    echo view('header');
    echo view('menu');
    echo view('pengumuman', $data);
    echo view('footer');
}else{
            return redirect()->to('home/login');
        } 
    }
public function kirimpengumuman()
{
    if ($this->request->getMethod() === 'post') {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'target_role' => 'required',
            'metode_pengiriman' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('error', 'Semua field wajib diisi.');
        }

        $data = [
            'judul_pengumuman' => $this->request->getPost('judul_pengumuman'),
            'isi_pengumuman' => $this->request->getPost('isi_pengumuman'),
            'target_role' => $this->request->getPost('target_role'),
            'metode_pengiriman' => implode(', ', $this->request->getPost('metode_pengiriman')),
            'status' => 'pending'
        ];

        $model = new M_oke(); // Ganti dengan nama model Anda
        if ($model->insert($data)) {
            return redirect()->to(base_url('home/pengumuman'))->with('success', 'Pengumuman berhasil dikirim.');
        } else {
            return redirect()->back()->with('error', 'Pengumuman gagal dikirim.');
        }
    }
}


private function sendWhatsApp($phone, $message)
{
    $apiUrl = "https://api.wabot.id/send-message"; // Ubah URL sesuai layanan WhatsApp yang digunakan
    $apiKey = "API_KEY_ANDA"; // Masukkan API key Anda

    $data = [
        'phone' => $phone,
        'message' => $message,
    ];

    $headers = [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/json",
    ];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $apiUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => $headers,
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        return false; // Gagal mengirim pesan
    }

    $responseData = json_decode($response, true);
    return isset($responseData['status']) && $responseData['status'] == 'success';
}
private function sendEmail($email, $subject, $body)
{
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Sesuaikan dengan provider Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'emailanda@gmail.com'; // Masukkan email Anda
        $mail->Password = 'password_email_anda'; // Masukkan password email Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Pengaturan email
        $mail->setFrom('emailanda@gmail.com', 'Pengumuman Sekolah');
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Kirim email
        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log error jika pengiriman gagal
        log_message('error', 'Email error: ' . $mail->ErrorInfo);
        return false;
    }

}}