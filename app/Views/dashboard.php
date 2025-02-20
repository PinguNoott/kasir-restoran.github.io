<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .stat-box {
            background: #bbdefb;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #01579b;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Dashboard Tugas</div>

    <!-- Form Statistik -->
    <div class="row">
        <div class="col-md-4">
            <div class="stat-box">Total Tugas: <?= $totalTugas ?></div>
        </div>
        <div class="col-md-4">
            <div class="stat-box">Selesai: <?= $selesai ?></div>
        </div>
        <div class="col-md-4">
            <div class="stat-box">Belum Selesai: <?= $belumSelesai ?></div>
        </div>
    </div>
</div>

</body>
</html>
