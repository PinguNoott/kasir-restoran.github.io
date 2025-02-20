<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas</title>
    <style>
        body {
            background: #F0F9FF;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #3498db;
            font-size: 24px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background: #B0E0E6; /* Soft blue pastel */
            color: #333;
            padding: 12px;
            font-size: 16px;
        }
        td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }
        tr:nth-child(even) {
            background: #E6F2FF;
        }
        .btn-back {
            display: block;
            width: 150px;
            margin: 15px auto;
            padding: 12px;
            text-align: center;
            background: #3498db;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 30px;
            transition: 0.3s;
        }
        .btn-back:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📜 Log Aktivitas</h2>
    <a href="<?= base_url('home/clearLog') ?>" class="btn-back" onclick="return confirm('Apakah Anda yakin ingin menghapus semua log aktivitas?')">Hapus Semua Log</a>

    <table>
        <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Aksi</th>
            <th>Deskripsi</th>
            <th>Waktu</th>
        </tr>
        <?php $no = 1; foreach ($logActivity as $log) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($log['id_user']) ?></td>
            <td><?= esc($log['aksi']) ?></td>
            <td><?= esc($log['deskripsi']) ?></td>
            <td><?= esc($log['timestamp']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
