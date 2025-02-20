<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap">
   <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0F9FF;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
        }

        .table-title {
            margin-bottom: 10px;
            color: #A6D0F1;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #FFFFFF;
        }

        table th, table td {
            border: 1px solid #A6D0F1;
            text-align: center;
            padding: 10px;
        }

        table th {
            background-color: #A6D0F1;
            color: white;
            font-size: 1.2rem;
        }

        table tr:nth-child(even) {
            background-color: #E6F4FF;
        }

        .btn {
            border-radius: 10px;
            padding: 10px 15px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-transform: capitalize;
        }

        .btn-success {
            background-color: #A6D0F1;
            border: none;
            color: white;
        }

        .btn-success:hover {
            background-color: #76B2C3;
        }

        .btn-primary {
            background-color: #76B2C3;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #A6D0F1;
        }

        .btn-danger {
            background-color: #FF6B81;
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #FF3D57;
        }
    </style>
</head>
<body>

<div class="content">
    <div class="table-title">Tabel Tugas</div>

    <!-- Total Tugas -->
    <div class="total-tugas">Total Tugas: <span id="totalTugas"><?= count($desta) ?></span></div>

        <!-- Form Pencarian -->
        <form method="GET" action="<?= base_url('home/tugas') ?>">
            <input type="text" name="keyword" placeholder="Cari Nama Tugas..." value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="<?= base_url('home/tugas') ?>" class="btn btn-secondary">Reset</a>
        </form>

        <button type="button" class="btn btn-success" onclick="window.location.href='<?= base_url('home/tambahtugas') ?>'">Tambah</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tugas</th>
                    <th>Prioritas</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($desta as $tugas) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $tugas->nama_tugas ?></td>
                    <td><?= $tugas->prioritas ?></td>
                    <td><?= $tugas->status ?></td>
                    <td><?= date('d-m-Y', strtotime($tugas->tanggal)) ?></td>
                    <td>
    <a href="<?= base_url('home/edittugas/' . $tugas->id_tugas . '?keyword=' . urlencode($_GET['keyword'] ?? '')) ?>">
        <button class="btn btn-primary">Edit</button>
    </a>
    <a href="<?= base_url('home/hapustugas/' . $tugas->id_tugas . '?keyword=' . urlencode($_GET['keyword'] ?? '')) ?>" 
       onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
        <button class="btn btn-danger">Hapus</button>
    </a>
</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>


</body>
</html>


</html>
