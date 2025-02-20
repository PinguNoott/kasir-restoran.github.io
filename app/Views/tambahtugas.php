<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
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
        <h2>Tambah Tugas</h2>
        <form action="<?= base_url('home/aksi_t_tugas') ?>" method="post">
            <label for="nama_tugas">Nama Tugas</label>
            <input type="text" id="nama_tugas" name="nama_tugas" placeholder="Masukkan nama tugas" required>

            <label for="prioritas">Prioritas</label>
            <select id="prioritas" name="prioritas" required>
                <option value="Rendah">Rendah</option>
                <option value="Sedang">Sedang</option>
                <option value="Tinggi">Tinggi</option>
            </select>

           <label for="status">Status</label>
<input type="text" id="status" name="status" value="Belum Selesai" readonly>


            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <button type="submit">Submit</button>
        </form>
        <div class="form-footer">
            <a href="<?= base_url('home/tugas') ?>">Kembali</a>
        </div>
    </div>
</body>

</html>
