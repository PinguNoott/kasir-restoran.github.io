<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <!-- Link Google Font (Baloo 2) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap">
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
        <div class="table-title">Tabel Transaksi</div>
        
        <button type="button" class="btn btn-success" onclick="window.location.href='<?=base_url('home/tambahtransaksi')?>'">Tambah Transaksi</button>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Tanggal Transaksi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $key => $satu) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $satu->nama_pembeli ?></td>
                            <td><?= $satu->jumlah ?></td>
                            <td><?= number_format($satu->harga, 2) ?></td>
                            <td><?= $satu->tanggal_transaksi ?></td>
                            <td>
                        <?php
                        // Menampilkan status transaksi
                        if ($satu->status == 'pending') {
                            echo '<span class="badge badge-warning">Pending</span>';
                        } elseif ($satu->status == 'completed') {
                            echo '<span class="badge badge-success">Completed</span>';
                        } elseif ($satu->status == 'cancelled') {
                            echo '<span class="badge badge-danger">Cancelled</span>';
                        }
                        ?>
                    </td>
                            <td>
                                <a href="<?= base_url('home/edittransaksi/'.$satu->id_transaksi) ?>">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <a href="<?= base_url('home/hapustransaksi/'.$satu->id_transaksi) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                                    <button class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
