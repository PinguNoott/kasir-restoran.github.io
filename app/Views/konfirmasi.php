<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            margin: 0;
            padding: 0;
            background-color: #E1F5FE;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .content {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 255, 0.2);
            box-sizing: border-box;
        }

        .card-header {
            background-color: #1976D2;
            color: white;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .confirmation-container {
            padding: 20px;
            text-align: center;
        }

        .confirmation-container p {
            font-size: 18px;
            color: #1976D2;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #4FC3F7;
            text-align: left;
        }

        th {
            background-color: #4FC3F7;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f1f9fe;
        }

        td {
            font-size: 14px;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            background-color: #1976D2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: #1565C0;
        }

        .back-link {
            margin-top: 20px;
            font-size: 16px;
            color: #1976D2;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="card-header">
            Konfirmasi Pesanan
        </div>

        <div class="confirmation-container">
            <p>Terima kasih atas pesanan Anda!</p>

            <!-- Display order details -->
            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>Rp <?= number_format($item['harga'] * $item['quantity'], 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p><strong>Total: Rp <?= number_format($total, 2, ',', '.') ?></strong></p>
            <p><strong>Uang Dibayar: Rp <?= number_format($payment, 2, ',', '.') ?></strong></p>
            <p><strong>Kembalian: Rp <?= number_format($change, 2, ',', '.') ?></strong></p>

            <!-- Button to go back to the dashboard -->
            <a href="<?= base_url('home/order') ?>" class="btn">Kembali</a>
        </div>
    </div>
</body>
</html>
