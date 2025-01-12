<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Link Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            margin: 0;
            padding: 0;
            background-color: #E3F2FD; /* Light blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #1976D2;
            margin-bottom: 20px;
            font-weight: 600;
            text-transform: uppercase;
        }

        label {
            font-size: 14px;
            color: #1976D2;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #1976D2;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            color: #555;
        }

        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #1976D2;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #1976D2;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #1565C0;
            box-shadow: 0 4px 10px rgba(25, 118, 210, 0.4);
        }

        .form-footer {
            margin-top: 10px;
            text-align: center;
        }

        .form-footer a {
            text-decoration: none;
            color: #1976D2;
            font-size: 14px;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            h2 {
                font-size: 1.5rem;
            }

            button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form action="<?= base_url('home/aksi_signup') ?>" method="POST">
            <!-- Display error message if any -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger invalid-feedback">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <label for="yourUsername">Username</label>
            <input type="text" name="username" id="yourUsername" placeholder="Enter Username" required>

            <label for="yourEmail">Email</label>
            <input type="text" name="email" id="yourEmail" placeholder="Enter Email" required>

            <label for="yourPassword">No Telp</label>
            <input type="text" name="telp" id="yourNoTelp" placeholder="Enter No Telp" required>

            <label for="yourPassword">Password</label>
            <input type="password" name="password" id="yourPassword" placeholder="Enter Password" required>

            <button type="submit">Sign Up</button>

            <div class="form-footer">
                <p class="small mb-0">Already have an account? <a href="<?= base_url('home/login') ?>">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>
