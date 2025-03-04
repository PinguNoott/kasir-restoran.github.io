<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap">
    <style>
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 490px;
            text-align: center;
        }

        h2 {
            color: #A6D0F1;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #A6D0F1;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #A6D0F1;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #76B2C3;
        }

        .form-footer {
            margin-top: 10px;
        }

        .form-footer a {
            text-decoration: none;
            color: #76B2C3;
            font-weight: bold;
        }

        .form-footer a:hover {
            color: #A6D0F1;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit User</h2>
        <form action="<?= base_url('home/aksi_e_user') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $a->id_user ?>">

            <label for="nama">Username</label>
            <input type="text" id="nama" name="nama" value="<?= $a->username ?>" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?= $a->password ?>" required>

            <label for="level">Level</label>
            <select id="level" name="level" required>
                <option value="1" <?= $a->level == 1 ? 'selected' : '' ?>>User</option>
                <option value="2" <?= $a->level == 2 ? 'selected' : '' ?>>Admin</option>
            </select>

            <label for="foto">Foto (Biarkan kosong jika tidak ingin mengubah)</label>
            <input type="file" id="foto" name="foto">
            <input type="hidden" name="foto_lama" value="<?= $a->foto ?>">

            <button type="submit">Submit</button>
        </form>
        <div class="form-footer">
            <a href="<?= base_url('home/user') ?>">Kembali</a>
        </div>
    </div>
</body>
</html>
