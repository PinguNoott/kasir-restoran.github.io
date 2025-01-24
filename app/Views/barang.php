<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Menu</title>
    <!-- Link Google Font (Poppins) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0F9FF; /* Light blue background */
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
        }

        .table-title {
            margin-bottom: 10px;
            color: #A6D0F1; /* Light blue */
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #FFFFFF; /* White background */
        }

        table th, table td {
            border: 1px solid #A6D0F1; /* Light blue border */
            text-align: center;
            padding: 10px;
        }

        table th {
            background-color: #A6D0F1;
            color: white;
            font-size: 1.2rem;
        }

        table tr:nth-child(even) {
            background-color: #E6F4FF; /* Light alternate row color */
        }

        .btn {
            border-radius: 10px;
            padding: 10px 15px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-transform: capitalize;
        }

        .btn-success {
            background-color: #A6D0F1; /* Light blue */
            border: none;
            color: white;
        }

        .btn-success:hover {
            background-color: #76B2C3; /* Darker blue */
        }

        .btn-primary {
            background-color: #76B2C3; /* Darker blue */
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #A6D0F1; /* Light blue */
        }

        .btn-danger {
            background-color: #FF6B81; /* Soft red */
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #FF3D57; /* Vibrant red */
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="table-title">Tabel Barang</div>
        
        <button type="button" class="btn btn-success" onclick="window.location.href='<?= base_url('home/tambahbarang') ?>'">Tambah</button>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Diskon</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($barangData)): ?>
                    <?php $no = 1; foreach ($barangData as $barang): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($barang->nama_barang) ?></td>
                            <td>Rp <?= number_format($barang->harga, 2, ',', '.') ?></td>
                            <td><?= esc($barang->kategori) ?></td>
                            <td><?= esc($barang->diskon) ?></td>
                            <td>
                                <?php if ($barang->foto): ?>
                                    <img src="<?= base_url('images/'.$barang->foto) ?>" alt="Image" width="100">
                                <?php else: ?>
                                    <img src="<?= base_url('images/default.jpg') ?>" alt="No image available" width="100">
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('home/editbarang/'.$barang->id_barang) ?>">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <a href="<?= base_url('home/hapusbarang/'.$barang->id_barang) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <button class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Data tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
