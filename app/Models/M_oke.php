<?php

namespace App\Models;

use CodeIgniter\Model;

class M_oke extends Model
{
    // Default table
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'no_telp', 'level'];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $returnType = 'array'; // atau 'object' jika ingin objek

    // Function to switch to 'barang' table
    public function barang()
    {
        $this->table = 'barang';
        $this->primaryKey = 'id_barang';
        $this->allowedFields = ['nama_barang', 'harga', 'kategori', 'diskon', 'foto'];
        return $this;
    }

    // Function to switch to 'transaksi' table
    public function transaksi()
    {
        $this->table = 'transaksi';
        $this->primaryKey = 'id_transaksi';
        $this->allowedFields = ['nama_pembeli', 'jumlah', 'harga', 'tanggal_transaksi', 'status'];
        return $this;
    }

    // **Tambahkan function untuk 'orders' table**
    public function orders()
{
    $this->table = 'orders';
    $this->primaryKey = 'id_order';
    $this->allowedFields = ['id_user', 'id_barang', 'jumlah', 'created_at', 'name', 'address', 'payment_method', 'total', 'cart_data', 'status'];
    return $this;
}
public function softdelete()
{
    return $this->onlyDeleted()->findAll(); // Mengambil hanya data yang terhapus (soft delete)
}

public function restore($id_user)
{
    $builder = $this->db->table($this->table); // Dapatkan builder query
    return $builder->update(['deleted_at' => null], ['id_user' => $id_user]);
}
public function restore2($id_barang)
{
    $builder = $this->db->table($this->table); // Dapatkan builder query
    return $builder->update(['deleted_at' => null], ['id_barang' => $id_barang]);
}

    public function getAll()
    {
        return $this->findAll();
    }
    
    public function get_barang_by_kategori($kategori)
{
    $this->barang();  // Pastikan Anda menggunakan tabel 'barang'
    
    if (empty($kategori)) {
        return $this->findAll();  // Kembalikan semua barang jika kategori kosong
    } else {
        // Filter berdasarkan kategori yang dipilih dan kembalikan sebagai objek
        return $this->where('kategori', $kategori)->findAll(); 
    }

    return $this->where('kategori', $kategori)->findAll();
}

    public function update($id = null, $data = null): bool
    {
        return $this->db->table('barang')->update($data, ['id_barang' => $id]);
    }

    public function addUser($data)
    {
        return $this->insert($data);
    }

    public function getById($id)
    {
        // Query manual dengan builder
        $query = $this->db->query("SELECT * FROM barang WHERE id_barang = ?", [$id]);
        return $query->getRow(); // Mengembalikan satu baris hasil
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

    public function getBarang()
    {
        return $this->findAll(); // This will fetch all records from the barang table
    }

    // If you need to include soft deletes (with 'deleted_at')
    public function getBarangWithDeleted()
    {
        return $this->withDeleted()->findAll(); // Fetch all records including soft-deleted ones
    }


    public function getBarangById($id_barang)
    {
        return $this->db->table('barang')->where('id_barang', $id_barang)->get()->getRow();
    }

    // Add item to the cart
    public function addToCart($barang)
    {
        $session = session();

        // If the cart does not exist in the session, initialize it
        if (!$session->has('cart')) {
            $session->set('cart', []);
        }

        // Get the cart from the session
        $cart = $session->get('cart');

        // Check if the item is already in the cart, if yes, update the quantity
        if (isset($cart[$barang->id_barang])) {
            $cart[$barang->id_barang]['quantity']++;
        } else {
            // If not in the cart, add the item with a quantity of 1
            $cart[$barang->id_barang] = [
                'id_barang' => $barang->id_barang,
                'nama_barang' => $barang->nama_barang,
                'harga' => $barang->harga,
                'quantity' => 1,
                'foto' => $barang->foto
            ];
        }

        // Save the updated cart back to the session
        $session->set('cart', $cart);
    }

    // Save Order in the 'orders' table
    public function saveOrder($name, $address, $payment_method, $total, $cart)
    {
        // Define table and primary key for 'orders'
        $this->table = 'orders';  
        $this->primaryKey = 'id_order';

        // Prepare the data for insertion
        $data = [
            'name' => $name,
            'address' => $address,
            'payment_method' => $payment_method,
            'total' => $total,
            'cart_data' => json_encode($cart),  // Save the cart as a JSON string
            'status' => 'pending',  // Default status is pending
        ];

        // Insert the order into the database
        return $this->insert($data);
    }
}
