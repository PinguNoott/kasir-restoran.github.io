<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            margin: 0;
            padding: 0;
            background-color: #E1F5FE; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .checkout {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 255, 0.2);
            box-sizing: border-box;
        }

        .checkout h2 {
            text-align: center;
            color: #1976D2;
            font-size: 24px;
        }

        .checkout table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .checkout th, .checkout td {
            padding: 12px;
            border: 1px solid #4FC3F7; /* Soft blue border */
            text-align: left;
            font-size: 14px;
        }

        .checkout th {
            background-color: #4FC3F7; /* Soft blue header */
            color: white;
        }

        .checkout tr:nth-child(even) {
            background-color: #f1f9fe; /* Light blue rows */
        }

        .checkout td {
            font-size: 14px;
            color: #555;
        }

        .checkout p {
            font-size: 18px;
            font-weight: bold;
            color: #1976D2; /* Darker blue */
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 16px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #4FC3F7;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #1976D2; /* Dark blue background */
            color: white; /* Text color is white for contrast */
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: #1565C0; /* Darker blue on hover */
        }

        .checkout a {
            text-decoration: none;
            color: #1976D2;
            font-size: 14px;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .checkout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="checkout">
        <h2>Checkout</h2>

        <?php 
        // Get the cart data from session again
        $cart = session()->get('cart') ?? [];
        $total = 0;
        $totalAfterDiscount = 0;
        if (count($cart) > 0):
        ?>
            <table>
                <thead>
                    <tr>
                         <th>Nama Barang</th>
                         <th>Harga</th>
                         <th>Jumlah</th>
                         <th>Diskon</th> <!-- Diskon per item -->
                         <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): 
                        // Calculate discount amount per item
                        $discountAmount = ($item['harga'] * $item['diskon']) / 100;
                        $itemPriceAfterDiscount = ($item['harga'] - $discountAmount) * $item['quantity'];
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                            <td>Rp <?= number_format($item['harga'], 2, ',', '.') ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td><?= $item['diskon'] ?>%</td> <!-- Display discount percentage -->
                            <td>Rp <?= number_format($itemPriceAfterDiscount, 2, ',', '.') ?></td> <!-- Total after discount -->
                        </tr>
                        <?php
                        // Add to total
                        $total += $item['harga'] * $item['quantity']; // Total before discount
                        $totalAfterDiscount += $itemPriceAfterDiscount; // Total after discount
                        endforeach;
                        ?>
                </tbody>
            </table>

            <p><strong>Total Sebelum Diskon: Rp <?= number_format($total, 2, ',', '.') ?></strong></p>
            <p><strong>Total Setelah Diskon: Rp <?= number_format($totalAfterDiscount, 2, ',', '.') ?></strong></p>

            <!-- Form untuk Input Uang dan Konfirmasi -->
            <form method="POST" action="<?= base_url('home/confirm_order') ?>">
                <input type="hidden" name="cart" value="<?= htmlspecialchars(json_encode($cart)) ?>">
                <input type="hidden" name="total" value="<?= $totalAfterDiscount ?>">

                <!-- Input Uang Pembayaran -->
                <div class="form-group">
                    <label for="payment">Masukkan Uang Pembayaran:</label>
                    <input type="number" id="payment" name="payment" required min="<?= $totalAfterDiscount ?>" placeholder="Masukkan jumlah uang">
                </div>

                <button type="submit" class="btn">Bayar</button>
            </form>
        <?php else: ?>
            <p>Keranjang belanja kosong. <a href="<?= base_url('home/order') ?>">Kembali Belanja</a></p>
        <?php endif; ?>
    </div>
</body>

</html>
