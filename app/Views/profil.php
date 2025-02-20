<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            margin: 0;
            padding: 0;
            background-color: #F0F9FF; /* Biru lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
        }

        .profile-container {
            background: #FFFFFF;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
            border: 2px solid #4DA8FF; /* Biru lembut */
            text-align: center;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #4DA8FF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #4DA8FF;
            font-size: 22px;
            margin-bottom: 10px;
        }

        label {
            font-size: 14px;
            color: #4DA8FF;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 8px;
            margin: 6px 0;
            border: 1px solid #4DA8FF;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            color: #555;
            background-color: #F0F9FF;
            transition: 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #3A90E6;
            background-color: #E6F4FF;
        }

        .file-input {
            width: 85%;
            padding: 8px;
            border: 1px dashed #4DA8FF;
            border-radius: 6px;
            background-color: #F0F9FF;
            cursor: pointer;
            font-size: 14px;
            color: #4DA8FF;
            margin-top: 10px;
        }

        button {
            width: 85%;
            padding: 10px;
            background-color: #4DA8FF;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 12px;
            font-weight: bold;
        }

        button:hover {
            background-color: #3A90E6;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
        }

        .form-footer {
            margin-top: 15px;
        }

        .form-footer a {
            text-decoration: none;
            color: #4DA8FF;
            font-size: 14px;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Profil Pengguna</h2>

        <?php
        // Cek apakah user punya foto, kalau tidak pakai default 'user.jpg'
        $fotoProfil = (!empty($a->foto) && file_exists('images/' . $a->foto)) ? $a->foto : 'user.jpg';
        ?>

        <img src="<?= base_url('images/' . $fotoProfil) ?>" alt="Foto Profil" class="profile-photo">

        <form action="<?= base_url('home/aksi_e_profil') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $a->id_user ?>">

            <label for="nama">Username</label>
            <input type="text" id="nama" name="nama" value="<?= $a->username ?>" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?= $a->password ?>" required>

            <label for="foto">Tambahkan Foto Profil</label>
            <input type="file" id="foto" name="foto" class="file-input">
            <input type="hidden" name="foto_lama" value="<?= $a->foto ?? 'user.jpg' ?>">

            <button type="submit">Simpan Perubahan</button>
        </form>

        <div class="form-footer">
            <a href="<?= base_url('home/dashboard') ?>">Kembali ke Dashboard</a>
        </div>
    </div>
</body>

</html>
