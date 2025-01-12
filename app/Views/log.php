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
            transition: 0.3s;
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
        .flash-message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .flash-success {
            background-color: #DFF2BF;
            color: #4F8A10;
        }
        .flash-error {
            background-color: #FFBABA;
            color: #D8000C;
        }
          .btn-danger {
            background-color: #E57373; /* Soft red */
            color: white;
        }

        .btn-danger:hover {
            background-color: #EF5350; /* Darker red */
            transform: scale(1.05);
        }
    </style>
<!-- Daftar Pengumuman -->
        <div class="table-title">Daftar Pengumuman Terkirim</div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Target</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($pengumuman as $item): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($item->judul_pengumuman) ?></td>
                    <td><?= htmlspecialchars($item->isi_pengumuman) ?></td>
                    <td><?= ucfirst(htmlspecialchars($item->target_role)) ?></td>
                    <td><?= ucfirst(htmlspecialchars($item->metode_pengiriman)) ?></td>
                    <td><?= $item->status == 'success' ? 'Terkirim' : 'Gagal' ?></td>
                     <td class="actions">
                        <a href="<?= base_url('home/hapuslog/'.$pengumuman->id_log) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <button class="btn btn-danger">Hapus</button>
                        </a>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>