<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard</h1>
    <p>Hari ini adalah: 
        <?php
        // Setel timezone ke WIB (Asia/Jakarta)
        date_default_timezone_set('Asia/Jakarta');

        // Set locale ke bahasa Indonesia
        setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'id');

        // Tampilkan tanggal dalam bahasa Indonesia
        echo strftime('%A, %d %B %Y'); // Contoh: Senin, 01 Januari 2025
        ?>
    </p>
</body>
</html>
