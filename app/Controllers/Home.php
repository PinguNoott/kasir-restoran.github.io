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
    // Dapatkan semua barang berdasarkan kategori (kosongkan kategori untuk mengambil semua)
    $barangData = $this->M_oke->get_barang_by_kategori('');
    
    return view('cart', ['barangData' => $barangData]);
}
   
    public function order()
{
   if (session()->get('level') > 0) {
        $model = new M_oke();
  
         $data['barangData'] = $this->M_oke->get_barang_by_kategori($kategori);
    $data['kategori'] = $kategori;
        echo view('header');
        echo view('menu');
        echo view('order', $data);
        echo view('footer');

}else{
            return redirect()->to('home/login');
        } 
    }

public function filter_kategori()
{
    $kategori = $this->request->getGet('kategori');
    
    $data['barangData'] = $this->M_oke->get_barang_by_kategori($kategori);
    $data['kategori'] = $kategori;

    echo view('header');
    echo view('menu');
    echo view('order', $data);
    echo view('footer');
}


   public function dashboard()
{
   if (session()->get('level') > 0) {
    
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
    $no_telp = $this->request->getPost('no_telp'); // Ganti password dengan no_telp

    // Cari user berdasarkan username dan no_telp
    $user = $model->where(['username' => $username, 'no_telp' => $no_telp])->first();

    if ($user) {
        $session = session();
        $session->set([
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'no_telp' => $user['no_telp'], // Simpan no_telp ke session jika diperlukan
            'level' => $user['level'], 
            'logged_in' => true
        ]);

        return redirect()->to('home/dashboard'); // Redirect ke dashboard
    } else {
        return redirect()->to('home/login')->with('error', 'Username atau Nomor Telepon salah'); // Error jika login gagal
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
        $no_telp = $this->request->getPost('no_telp');

        // Validasi input
        if (empty($username) || empty($no_telp)) {
            return redirect()->to('home/signup')->with('error', 'All fields are required.');
        }

        // Validasi panjang username
        if (strlen($username) < 3 || strlen($username) > 20) {
            return redirect()->to('home/signup')->with('error', 'Username must be 3-20 characters long.');
        }

        // Validasi format no_telp (harus angka saja)
        if (!ctype_digit($no_telp)) {
            return redirect()->to('home/signup')->with('error', 'Phone number must contain only numeric values.');
        }

        $model = new M_oke();

        // Cek apakah username atau no_telp sudah ada di database
        $existingUser = $model->where('username', $username)
                              ->orWhere('no_telp', $no_telp)
                              ->first();

        if ($existingUser) {
            return redirect()->to('home/signup')->with('error', 'Username or phone number already exists.');
        }

        // Set level ke 1 (default user level)
        $newUser = [
            "username" => $username,
            "no_telp" => $no_telp,
            "level" => 1
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
        $data['desta'] = $model->findAll();

        echo view('header');
        echo view('menu');
        echo view('user', $data);
        echo view('footer');
    } else {
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

public function aksi_t_user()
{

        $data = array(
            'username' => $this->request->getPost('nama'),
            'no_telp' => $this->request->getPost('no_telp'),
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
    $b = $this->request->getPost('no_telp');
    $c = $this->request->getPost('level');
    $id = $this->request->getPost('id');
    
    $data = array(
        'username' => $a,
        'no_telp' => $b,
        'level' => $c
       
    );

    $where = array('id_user' => $id);
    $model->edit('user', $data, $where);
    return redirect()->to('home/user');
}
public function barang()
{
    if (session()->get('level') > 0) {
        $model = new M_oke();
        $data['barangData'] = $model->getAll();  // Call the getAll() method to fetch data

        echo view('header');
        echo view('menu');
        echo view('barang', $data);  // Pass $data to the 'barang' view
        echo view('footer');
    } else {
        return redirect()->to('home/login');  // Redirect to login if level <= 0
    }
}


public function tambahbarang()
{
    
    if (session()->get('level') > 0) {

        echo view('header');
        echo view('tambahbarang'); 
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function editbarang($id)
{
    // Check if the user has permission
    if (session()->get('level') > 0) {
        $model = new M_oke();
        // Fetch image data by ID
        $where = array('id_barang' => $id);
        $data['barang'] = $model->getwhere('barang', $where);

        // Render the views for editing an image
        echo view('header');
        echo view('editbarang', $data); // View to edit image data
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}


public function aksi_t_barang()
{
    $namabarang = $this->request->getPost('nama');
    $harga = $this->request->getPost('hb');
    $kategori = $this->request->getPost('kategori');
    $diskon = $this->request->getPost('diskon'); // Ambil diskon
    $foto = $this->request->getPost('foto');

    $foto = null;
    if ($this->request->getFile('foto')->isValid()) {
        $fotoFile = $this->request->getFile('foto');
        $foto = $fotoFile->getName();
        $fotoFile->move(WRITEPATH . 'images'); 
    }

    $data = array(
        'nama_barang' => $namabarang,
        'harga' => $harga,
        'kategori' => $kategori,
        'diskon' => $diskon, // Simpan diskon
        'foto' => $foto
    );

    $model = new M_oke();
    $model->tambah('barang', $data);  

    return redirect()->to('home/barang');
}

public function aksi_e_barang()
{
    $id = $this->request->getPost('id');
    $nama_barang = $this->request->getPost('nama');
    $harga = $this->request->getPost('hb');
    $kategori = $this->request->getPost('kategori');
    $diskon = $this->request->getPost('diskon');

    $model = new M_oke(); 
    $barangLama = $model->find($id); 

    // Ambil foto lama dari input hidden jika tidak ada foto baru yang di-upload
    $fotoLama = $this->request->getPost('foto_lama');

    // Check if there is a new file uploaded
    $file = $this->request->getFile('foto');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // If a new file is uploaded, we will replace the old image
        $newFileName = $file->getRandomName();
        $file->move('images', $newFileName);

        // If the old file exists, delete it from the 'images' directory
        if ($barangLama['foto'] && file_exists('images/' . $barangLama['foto'])) {
            unlink('images/' . $barangLama['foto']);
        }

        // Use the new file name for the 'foto' field
        $foto = $newFileName;
    } else {
        // If no new file is uploaded, retain the old image
        $foto = $fotoLama; // Use the old photo
    }

    // Prepare the data to update in the 'barang' table
    $data = [
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'kategori' => $kategori,
        'diskon' => $diskon,
        'foto' => $foto, // Update the 'foto' field with the new or old file name
    ];

    // Update the record in the 'barang' table with the new data
    $model->update($id, $data);

    return redirect()->to(base_url('home/barang'))->with('success', 'Data barang berhasil diperbarui!');
}

 
public function beli($id_barang)
{
    $model = new M_oke();
    $barang = $model->getBarangById($id_barang);
    $jumlah = $this->request->getPost('jumlah');  // Get the quantity from the form

    // Get the current cart session (if it exists)
    $cart = session()->get('cart') ?? [];

    // Jika barang sudah ada di cart, update jumlahnya
    if (isset($cart[$id_barang])) {
        $cart[$id_barang]['quantity'] += $jumlah;
    } else {
        // Jika barang belum ada, tambahkan ke cart
        $cart[$id_barang] = [
            'id_barang' => $barang->id_barang,
            'nama_barang' => $barang->nama_barang,
            'harga' => $barang->harga,
            'quantity' => $jumlah,
            'foto' => $barang->foto ?? ''  // Add image if exists
        ];
    }

    // Save the updated cart back to the session
    session()->set('cart', $cart);

    // Redirect to the cart page
    return redirect()->to('/home/cart');
}

   public function cart()
{
    // Get cart data from session
    $cart = session()->get('cart', []);  // Ensure cart is always an array

    // Pass cart data to the view
    return view('cart', ['cart' => $cart]);
}
public function addToCart(Request $request, $id_barang) {
    $barang = Barang::find($id_barang);

    // Retrieve the cart from session
    $cart = session()->get('cart', []);

    // Flag to check if the item exists in the cart
    $exists = false;
    foreach ($cart as &$item) {
        // If the item is already in the cart, increment its quantity
        if ($item['id_barang'] == $barang->id_barang) {
            $item['quantity']++;
            $exists = true;
            break;
        }
    }

    // If the item doesn't exist, add it to the cart with initial quantity of 1
    if (!$exists) {
        // Assume the discount is a percentage stored in the `barang` model
        $cart[] = [
            'id_barang' => $barang->id_barang,
            'nama_barang' => $barang->nama_barang,
            'harga' => $barang->harga,
            'quantity' => 1,  // Initial quantity
            'diskon' => $barang->diskon,  // Diskon dalam persen
        ];
    }

    // Save the updated cart to session
    session()->put('cart', $cart);

    return redirect('/cart'); // Redirect to the cart page
}

  public function checkout()
{
    // Get the cart from session
    $cart = session()->get('cart') ?? [];

    // Check if cart is empty
    if (empty($cart)) {
        // Redirect back to the cart page with an error message
        return redirect()->to('/home/cart')->with('error', 'Your cart is empty!');
    }

    // Calculate total before and after discount
    $totalBeforeDiscount = 0;
    $totalAfterDiscount = 0;

    foreach ($cart as $item) {
        // Total before discount
        $totalBeforeDiscount += $item['harga'] * $item['quantity'];

        // Calculate the discount amount and apply it
        $discountAmount = ($item['harga'] * $item['diskon']) / 100;
        $totalAfterDiscount += ($item['harga'] - $discountAmount) * $item['quantity'];
    }

    // Return the checkout view with cart data and totals
    return view('checkout', [
        'cart' => $cart,
        'totalBeforeDiscount' => $totalBeforeDiscount,
        'totalAfterDiscount' => $totalAfterDiscount
    ]);
}

public function confirm_order()
{
    // Ambil data dari form
    $cart = json_decode($this->request->getPost('cart'), true);
    $total = $this->request->getPost('total');
    $payment = $this->request->getPost('payment');

    // Hitung kembalian
    if ($payment >= $total) {
        $change = $payment - $total;

        // Simpan data transaksi ke database (opsional)
        $db = \Config\Database::connect();
        $builder = $db->table('transactions');
        $builder->insert([
            'cart' => json_encode($cart),
            'total' => $total,
            'payment' => $payment,
            'change' => $change,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Pass data to the view
        return view('konfirmasi', [
            'cart' => $cart,
            'total' => $total,
            'payment' => $payment,
            'change' => $change
        ]);

        // Setelah pembayaran berhasil, hapus cart dari session
    session()->forget('cart');

    } else {
        // If payment is not enough, redirect back
        return redirect()->to(base_url('home/checkout'))->with('error', 'Uang yang dibayarkan tidak cukup!');
    }
}

public function transaksi()
{
    if (session()->get('level') > 0) {
        $model = new M_oke();
        $data['transaksi'] = $model->tampil('transaksi');  // Change 'user' to 'transaksi'

        echo view('header');
        echo view('menu');
        echo view('transaksi', $data);  
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function tambahtransaksi()
{
    if (session()->get('level') > 0) {
        echo view('header');
        echo view('tambahtransaksi');  
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function edittransaksi($id)
{
    if (session()->get('level') > 0) {
        $model = new M_oke();
        $where = array('id_transaksi' => $id);  
        $data['a'] = $model->getwhere('transaksi', $where);  

        echo view('header');
        echo view('edittransaksi', $data);  
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function hapustransaksi($id)
{
    if (session()->get('level') > 0) {
        $model = new M_oke();
        $where = array('id_transaksi' => $id);  // Change 'id_user' to 'id_transaksi'
        $model->hapus('transaksi', $where);  // Change 'user' to 'transaksi'
        return redirect()->to('home/transaksi');
    } else {
        return redirect()->to('home/login');
    }
}

public function aksi_t_transaksi()
{
    $data = array(
        'nama_pembeli' => $this->request->getPost('nama'),  
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah'),
        'tanggal_transaksi' => $this->request->getPost('tanggal'),
        'status' => $this->request->getPost('status')
    );

    $model = new M_oke();
    $model->tambah('transaksi', $data);  // Change 'user' to 'transaksi'
    return redirect()->to('home/transaksi');
}

public function aksi_e_transaksi()
{
    $model = new M_oke();
    $nama_pembeli = $this->request->getPost('nama');
    $harga = $this->request->getPost('harga');
    $jumlah = $this->request->getPost('jumlah');
    $tanggal_transaksi = $this->request->getPost('tanggal');
    $status = $this->request->getPost('status');
    $id = $this->request->getPost('id');

    $data = array(
        'nama_pembeli' => $nama_pembeli,
        'harga' => $harga,
        'jumlah' => $jumlah,
        'tanggal_transaksi' => $tanggal_transaksi,
        'status' => $status
    );

    $where = array('id_transaksi' => $id);  // Change 'id_user' to 'id_transaksi'
    $model->edit('transaksi', $data, $where);  // Change 'user' to 'transaksi'
    return redirect()->to('home/transaksi');
}


public function ruser()
{
    $model = new M_oke();
    $data['desta'] = $model->softdelete(); // Mengambil data yang dihapus

    echo view('header');
    echo view('menu');
    echo view('ruser', $data); // Menampilkan data di view rpendaftaran
    echo view('footer');
}

 public function restore_user($id_user)
{
    $model = new M_oke();
    try {
        // Debugging: lihat ID yang diterima
    
        if ($model->restore($id_user)) {
            return redirect()->to('home/user')->with('success', 'Data berhasil dipulihkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal memulihkan data.');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}


public function hapus_user2($id_user)
{
    $model = new M_oke();
    $builder = $model->builder();

    // Cek apakah ID ada di database
    $cek = $builder->where('id_user', $id_user)->get()->getRowArray();
    if (!$cek) {
        return redirect()->to('home/ruser')->with('error', 'ID tidak ditemukan di database.');
    }

    // Hapus data permanen
    $builder->where('id_user', $id_user);
    if ($builder->delete()) {
        return redirect()->to('home/ruser')->with('success', 'Data berhasil dihapus permanen.');
    } else {
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}

public function hapususer()
{
    $id = $this->request->getGet('id'); // Ambil ID dari GET parameter
    $model = new M_oke();

    if (!$id) {
        return redirect()->to('/home/user'); // Redirect jika ID tidak ditemukan
    }

    // Cek apakah ID ada di database
    $cek = $model->find($id);
    if (!$cek) {
        return redirect()->to('/home/user'); // Redirect jika ID tidak ditemukan di database
    }

    // Soft delete berdasarkan ID
    $model->delete($id);

    // Redirect kembali ke halaman user setelah menghapus data
    return redirect()->to('/home/user');
}
public function rbarang()
{
    $model = new M_oke();
    $data['barangData'] = $model->softdelete(); // Mengambil data yang dihapus

    echo view('header');
    echo view('menu');
    echo view('rbarang', $data); // Menampilkan data di view rpendaftaran
    echo view('footer');
}

 public function restore_barang($id_user)
{
    $model = new M_oke();
    try {
        // Debugging: lihat ID yang diterima
    
        if ($model->restore2($id_barang)) {
            return redirect()->to('home/barang')->with('success', 'Data berhasil dipulihkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal memulihkan data.');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}


public function hapus_barang2($id_user)
{
    $model = new M_oke();
    $builder = $model->builder();

    // Cek apakah ID ada di database
    $cek = $builder->where('id_barang', $id_barang)->get()->getRowArray();
    if (!$cek) {
        return redirect()->to('home/rbarang')->with('error', 'ID tidak ditemukan di database.');
    }

    // Hapus data permanen
    $builder->where('id_barang', $id_barang);
    if ($builder->delete()) {
        return redirect()->to('home/rbarang')->with('success', 'Data berhasil dihapus permanen.');
    } else {
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}



public function hapusbarang()
{
    $id = $this->request->getGet('id'); // Ambil ID dari GET parameter
    $model = new M_oke();

    if (!$id) {
        return redirect()->to('/home/user'); // Redirect jika ID tidak ditemukan
    }

    // Cek apakah ID ada di database
    $cek = $model->find($id);
    if (!$cek) {
        return redirect()->to('/home/user'); // Redirect jika ID tidak ditemukan di database
    }

    // Soft delete berdasarkan ID
    $model->delete($id);

    // Redirect kembali ke halaman user setelah menghapus data
    return redirect()->to('/home/user');
}
}