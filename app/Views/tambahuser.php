<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah User</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
   <style>
    body {
        font-family: 'Baloo 2', cursive;
        margin: 0;
        padding: 0;
        background-color: #F0F9FF; /* Biru lembut */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        box-sizing: border-box;
    }

    .form-container {
        background: #FFFFFF;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 600px;
        box-sizing: border-box;
        border: 1px solid #4DA8FF; /* Biru lembut */
    }

    h2 {
        text-align: center;
        color: #4DA8FF;
        font-size: 18px;
        margin-bottom: 15px;
    }

    label {
        font-size: 12px;
        color: #4DA8FF; /* Biru lembut */
        font-weight: bold;
        display: block;
        margin: 8px 0 3px;
    }

    input[type="text"],
    select,
    textarea {
        width: 48%;
        padding: 6px;
        margin: 4px 1%;
        border: 1px solid #4DA8FF; /* Biru lembut */
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 12px;
        color: #555;
        display: inline-block;
        background-color: #F0F9FF; /* Biru lembut */
    }

    textarea {
        min-height: 70px;
        resize: none;
    }

    .file-input {
        width: 100%;
        display: flex;
        align-items: center;
        padding: 8px;
        margin: 8px 0;
        border: 1px dashed #4DA8FF; /* Biru lembut */
        border-radius: 8px;
        background-color: #F0F9FF;
        cursor: pointer;
        text-align: center;
        font-size: 12px;
        color: #4DA8FF;
    }

    .file-input:hover {
        background-color: #CCE7FF; /* Hover effect biru muda */
    }

    button {
        width: 48%;
        padding: 8px;
        background-color: #4DA8FF;
        color: white;
        font-size: 14px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        margin: 8px 1%;
        font-weight: bold;
    }

    button:hover {
        background-color: #3A90E6;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    }

    .form-footer {
        margin-top: 10px;
        text-align: center;
    }

    .form-footer a {
        text-decoration: none;
        color: #4DA8FF;
        font-size: 12px;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        input[type="text"],
        textarea,
        button {
            width: 100%;
        }

        .form-container {
            width: 90%;
        }
    }
</style>
</head>
<body>
    <div class="form-container">
        <h2>Form Tambah User</h2>
        <form action="<?= base_url('home/aksi_t_user') ?>" method="post" enctype="multipart/form-data">
            <label for="nama">Username</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan username" required>

            <label for="no_telp">No Telp</label>
            <input type="text" id="no_telp" name="no_telp" placeholder="Masukkan Nommor Telp" required>

            <label for="level">Level</label>
            <select id="level" name="level" required>
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>

            <button type="submit">Submit</button>
        </form>
        <div class="form-footer">
            <a href="<?= base_url('home/user') ?>">Kembali</a>
        </div>
    </div>
</body>
</html>
