<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel User</title>
    <!-- Link Google Font (Baloo 2) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap">
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            background-color: #E3F2FD; /* Light blue background */
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .table-title {
            text-align: center;
            font-size: 2rem;
            color: #1976D2; /* Primary blue */
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: capitalize;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-success {
            background-color: #64B5F6; /* Blue button */
            color: white;
        }

        .btn-success:hover {
            background-color: #42A5F5; /* Darker blue */
            transform: scale(1.05);
        }

        .btn-primary {
            background-color: #1976D2; /* Primary blue */
            color: white;
        }

        .btn-primary:hover {
            background-color: #1565C0; /* Darker blue */
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #E57373; /* Soft red */
            color: white;
        }

        .btn-danger:hover {
            background-color: #EF5350; /* Darker red */
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #42A5F5; /* Blue header */
            color: white;
            text-transform: uppercase;
        }

        /* Removed hover effect from thead (header) */
        table th {
            background-color: #42A5F5; /* No hover effect */
            color: white;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #BBDEFB; /* Light blue border */
        }

        table tr:nth-child(even) {
            background-color: #E3F2FD; /* Light blue alternate row */
        }

        /* Removed hover effect on rows */
        table tr:hover {
            background-color: #E3F2FD; /* Same as normal row */
            box-shadow: none;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .actions a {
            text-decoration: none;
        }

        .actions button {
            font-size: 0.9rem;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .table-title {
                font-size: 1.5rem;
            }

            table th, table td {
                padding: 8px;
            }

            .btn {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-title">Tabel User</div>
        <button class="btn btn-success" onclick="window.location.href='<?=base_url('home/tambahuser')?>'">Tambah</button>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Nomor WA</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($desta as $satu) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $satu->username ?></td>
                    <td><?= $satu->email ?></td>
                    <td><?= $satu->password ?></td>
                    <td><?= $satu->no_telp ?></td>
                    <td><?= ucfirst($satu->level) ?></td>
                    <td class="actions">
                        <a href="<?= base_url('home/edituser/'.$satu->id_user) ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="<?= base_url('home/hapususer/'.$satu->id_user) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
</body>
</html>
