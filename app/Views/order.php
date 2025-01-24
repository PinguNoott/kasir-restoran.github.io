<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .card-header {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #343a40;
        }
        .filter-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .filter-form label {
            font-size: 1.2rem;
            color: #333;
        }
        .filter-form select {
            padding: 8px 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .filter-form button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .filter-form button:hover {
            background-color: #0056b3;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding-top: 20px;
        }
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card-img img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .card-info {
            margin-top: 10px;
        }
        .card-info p {
            margin: 5px 0;
        }
        .card-info p strong {
            font-size: 1.2rem;
            font-weight: bold;
            color: #007bff;
        }
        .card-info .price {
            font-size: 1.1rem;
            color: #28a745;
            font-weight: bold;
        }
        .card-info .original-price {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.9rem;
            margin-left: 10px;
        }
        .card-actions {
            text-align: center;
            margin-top: 15px;
        }
        .card-actions form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .input-qty {
            width: 70px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-cancel {
            background-color: #dc3545;
            margin-top: 5px;
        }
        .btn-cancel:hover {
            background-color: #a71d2a;
        }
  
.discount-label {
    font-size: 2rem; 
    font-weight: bold;
    color: #fff;
    background-color: #ff5733; 
    padding: 8px 16px; 
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 10;
    border-radius: 5px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
}
        /* Responsive styling */
        @media (max-width: 768px) {
            .filter-form {
                flex-direction: column;
                align-items: flex-start;
            }
            .filter-form select,
            .filter-form button {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="card-header">
            Menu
        </div>
<form action="<?= base_url('home/filter_kategori') ?>" method="get" class="filter-form">
    <label for="kategori">Pilih Kategori:</label>
    <select name="kategori" id="kategori" class="input-select">
        <option value="" <?= empty($kategori) ? 'selected' : '' ?>>Semua Kategori</option>
        <option value="makanan" <?= isset($kategori) && $kategori == 'makanan' ? 'selected' : '' ?>>Makanan</option>
        <option value="minuman" <?= isset($kategori) && $kategori == 'minuman' ? 'selected' : '' ?>>Minuman</option>
        <option value="camilan" <?= isset($kategori) && $kategori == 'camilan' ? 'selected' : '' ?>>Camilan</option>
        <option value="dessert" <?= isset($kategori) && $kategori == 'dessert' ? 'selected' : '' ?>>Dessert</option>
    </select>
    <button type="submit" class="btn">Cari</button>
</form>
 

        <div class="grid-container">
            <?php if (empty($barangData)): ?>
    <p>Tidak ada Menu yang tersedia untuk kategori ini.</p>
<?php else: ?>
    <?php foreach ($barangData as $barang): ?>
        <div class="card">
            <div class="card-img">
                <?php if ($barang['foto']): ?>
                    <img src="<?= base_url('images/' . $barang['foto']) ?>" alt="Image">
                <?php else: ?>
                    <img src="<?= base_url('images/default.jpg') ?>" alt="No image available">
                <?php endif; ?>
            </div>
            <div class="card-info">
                <p><strong><?= htmlspecialchars($barang['nama_barang']) ?></strong></p>
                <?php 
                    // Hitung harga setelah diskon
                    $hargaDiskon = $barang['harga'] - ($barang['harga'] * $barang['diskon'] / 100);
                ?>

                <?php if ($barang['diskon'] > 0): ?>
                    <div class="discount-label">
                        -<?= $barang['diskon'] ?>%
                    </div>
                <?php endif; ?>

                <p class="price">
                    Rp <?= number_format($hargaDiskon, 2, ',', '.') ?> 
                    <?php if ($barang['diskon'] > 0): ?>
                        <span class="original-price">Rp <?= number_format($barang['harga'], 2, ',', '.') ?></span>
                    <?php endif; ?>
                </p>
                <p class="stock">Kategori: <?= htmlspecialchars($barang['kategori']) ?></p>
            </div>
            <div class="card-actions">
                <form action="<?= base_url('home/beli/' . $barang['id_barang']) ?>" method="post">
                    <label for="qty-<?= $barang['id_barang'] ?>">Jumlah:</label>
                    <input type="number" id="qty-<?= $barang['id_barang'] ?>" name="jumlah" class="input-qty" min="1" max="<?= htmlspecialchars($barang['stok']) ?>" required>
                    <button type="submit" class="btn">Pesan</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

        </div>
    </div>
</body>
</html>
