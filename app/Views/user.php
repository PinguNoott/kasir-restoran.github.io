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
        <div class="table-title">Tabel User</div>
        <button type="button" class="btn btn-success" onclick="window.location.href='<?= base_url('home/tambahuser') ?>'">Tambah</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($desta as $user) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user->username ?></td>
                      <td><?= $user->password ?></td>
                    <td><?= $user->level == '1' ? 'Admin' : 'User' ?></td>
                   <td>
    <?php if (!empty($user->foto)) : ?>
        <img src="<?= base_url('images/' . $user->foto) ?>" width="50" height="50" alt="Foto User">
    <?php else : ?>
        Tidak ada foto
    <?php endif; ?>
</td>
                    <td>
                        <a href="<?= base_url('home/edituser/' . $user->id_user) ?>">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="<?= base_url('home/hapususer/' . $user->id_user) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <button class="btn btn-danger">Hapus</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
