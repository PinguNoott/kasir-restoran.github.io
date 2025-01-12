<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengumuman</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap">
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            background-color: #E3F2FD;
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
            color: #1976D2;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        form {
            margin-bottom: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        form input, form select, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #BBDEFB;
            border-radius: 5px;
            font-family: 'Baloo 2', cursive;
        }
        form button {
            background-color: #1976D2;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        form button:hover {
            background-color: #1565C0;
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
            background-color: #42A5F5;
            color: white;
            text-transform: uppercase;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #BBDEFB;
        }
        table tr:nth-child(even) {
            background-color: #E3F2FD;
        }
        .actions button {
            font-size: 0.9rem;
            padding: 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-success {
            background-color: #4CAF50;
            color: white;
        }
        .btn-danger {
            background-color: #F44336;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-title">Form Buat Pengumuman</div>
        <form action="<?= base_url('home/kirimpengumuman') ?>" method="post">
            <label for="judul_pengumuman">Judul Pengumuman:</label>
            <input type="text" id="judul_pengumuman" name="judul_pengumuman" placeholder="Masukkan judul pengumuman" required>

            <label for="isi_pengumuman">Isi Pengumuman:</label>
            <textarea id="isi_pengumuman" name="isi_pengumuman" rows="5" placeholder="Masukkan isi pengumuman" required></textarea>

            <label for="target_role">Target Role:</label>
            <select id="target_role" name="target_role" required>
                <option value="">-- Pilih Target --</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
                <option value="ortu">Orang Tua</option>
                <option value="semua">Semua</option>
            </select>

            <label>Metode Pengiriman:</label>
            <div>
                <input type="checkbox" id="wa" name="metode_pengiriman[]" value="wa">
                <label for="wa">WhatsApp</label>
                <input type="checkbox" id="email" name="metode_pengiriman[]" value="email">
                <label for="email">Email</label>
            </div>

            <button type="submit">Kirim Pengumuman</button>
        </form>

       
    <?php if (session()->getFlashdata('success')): ?>
    <div style="color: green;"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div style="color: red;"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

</body>
</html>
