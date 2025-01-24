<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?= base_url('path/to/your/bootstrap.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&family=Baloo+2:wght@600&display=swap">
    <style>
        body {
            background-color: #a6d0f1; /* Warna biru terang */
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            background-color: #ffffff; /* Putih untuk kontras */
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            position: relative;
            text-align: center;
        }

        .login-container img {
            max-width: 120px;
            margin-bottom: 1rem;
            border-radius: 50%;
            background: #62b0e7; /* Warna biru cerah untuk logo */
            padding: 10px;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #62b0e7; /* Border biru cerah */
            font-size: 1rem;
            padding: 0.6rem 1rem;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #62b0e7; /* Biru cerah */
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 0.7rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #4a90e2; /* Biru lebih gelap pada hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h5.card-title {
            font-family: 'Baloo 2', cursive;
            color: #4a90e2;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .text-center a {
            color: #4a90e2;
            font-weight: bold;
            text-decoration: none;
        }

        .text-center a:hover {
            color: #2e77b0;
        }

        .invalid-feedback {
            font-size: 0.9rem;
            color: #d9534f; /* Warna merah untuk error */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="login-container">
                    <div class="d-flex justify-content-center py-4">
                        <a href="<?= base_url('index.html') ?>" class="logo d-flex align-items-center w-auto">
                            <img src="<?= base_url('images/miaw.png') ?>" alt="PetMate Logo">
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Sign Up</h5>
                        </div>

                        <!-- Menampilkan pesan kesalahan jika ada -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form class="row g-3 needs-validation" novalidate action="<?= base_url('home/aksi_signup') ?>" method="POST">
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                            </div>

                            <div class="col-12">
                                <label for="yourNotelp" class="form-label">No Telp</label>
                                <input type="text" name="no_telp" class="form-control" id="yourNotelp" required>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0 text-center">Already have an account? <a href="<?= base_url('home/login') ?>">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
