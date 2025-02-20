<!DOCTYPE html>
<html lang="id">
<head>
    <title>Pengaturan Website 🎀</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            background-color: #F0F9FF;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
       .container {
    max-width: 500px;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
    transition: 0.3s;
    border: 3px solid #AEE2FF;
    text-align: left;
    
    /* Tambahkan properti ini */
    margin: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

        h2 {
            color: #6B93FF;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            flex: 1;
            font-weight: bold;
        }
        .form-group input[type="text"], 
        .form-group input[type="file"] {
            flex: 2;
            padding: 8px;
            border: 2px solid #6B93FF;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        input[type="text"]:focus, 
        input[type="file"]:focus {
            border-color: #477EFF;
        }
        .preview-img {
            max-width: 60px;
            height: auto;
            margin-left: 10px;
            border-radius: 8px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
            border: 2px solid #AEE2FF;
            padding: 4px;
            background: #fff;
        }
        button {
            background-color: #6B93FF;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        button:hover {
            background-color: #477EFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pengaturan Website</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= base_url('home/update_setting') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Website:</label>
                <input type="text" name="judul_website" value="<?= esc($setting['judul_website'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label>Logo Website:</label>
                <input type="file" name="logo_website">
                <img src="<?= base_url($setting['logo_website'] ?? 'images/bubble.jpeg') ?>" class="preview-img">
            </div>

            <div class="form-group">
                <label>Logo Login:</label>
                <input type="file" name="logo_login">
                <img src="<?= base_url($setting['logo_login'] ?? 'images/miaw.png') ?>" class="preview-img">
            </div>

            <button type="submit">💾 Simpan Perubahan</button>
        </form>
        <a href="<?= base_url('home/dashboard') ?>" class="back-btn">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>
