<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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

        .content {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 255, 0.2);
            box-sizing: border-box;
        }

        .cart-summary {
            text-align: center;
        }

        .cart-summary table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-summary th, .cart-summary td {
            padding: 12px;
            border: 1px solid #4FC3F7; /* Soft blue border */
            text-align: left;
            font-size: 14px;
        }

        .cart-summary th {
            background-color: #4FC3F7; /* Soft blue header */
            color: white;
        }

        .cart-summary tr:nth-child(even) {
            background-color: #f1f9fe; /* Light blue rows */
        }

        .cart-summary td {
            font-size: 14px;
            color: #555;
        }

        .cart-summary p {
            font-size: 18px;
            font-weight: bold;
            color: #1976D2; /* Darker blue */
        }

    .btn {
    padding: 10px 20px;
    background-color: #1976D2; /* Dark blue background */
    color: white; /* Ensure text is white for contrast */
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 20px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.btn:hover {
   
    color: white; /* Ensure text stays white even when hovering */
}


        .cart-summary a {
            text-decoration: none;
            color: #1976D2;
            font-size: 14px;
        }

        .cart-summary a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="cart-summary">
            <?php 
            $cart = session()->get('cart') ?? []; // Retrieve the cart from session
            $total = 0;
            $totalDiskon = 0; // Untuk total setelah diskon
            if (count($cart) > 0):
            ?>
                <table>
                    <thead>
                        <tr>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Diskon</th>
                          <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $item): 
                            // Hitung harga setelah diskon
                            $hargaDiskon = $item['harga'] - ($item['harga'] * $item['diskon'] / 100); 
                            $totalItem = $hargaDiskon * $item['quantity'];
                            $total += $totalItem;
                            $totalDiskon += $item['harga'] * $item['quantity'] - $totalItem;
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                                <td>Rp <?= number_format($item['harga'], 2, ',', '.') ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $item['diskon'] ?>%</td>
                                <td>Rp <?= number_format($totalItem, 2, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <p><strong>Total Harga Sebelum Diskon: Rp <?= number_format($totalDiskon, 2, ',', '.') ?></strong></p>
                <p><strong>Total Setelah Diskon: Rp <?= number_format($total, 2, ',', '.') ?></strong></p>
                <a href="<?= base_url('home/checkout') ?>" class="btn">Checkout</a>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
