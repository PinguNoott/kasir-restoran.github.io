<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Reset some default browser styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* General Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #F0F9FF; /* Light blue background */
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

/* Container Styling for Settings */
.settings-container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 100%;
    max-width: 600px;
}

/* Header Styling */
h2 {
    text-align: center;
    color: #4A90E2;
    margin-bottom: 30px;
}

/* Form Items Styling */
.setting-item {
    margin-bottom: 20px;
}

.setting-item label {
    font-size: 1rem;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

.setting-item input[type="text"],
.setting-item input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    margin-top: 5px;
}

.setting-item small {
    display: block;
    margin-top: 5px;
    color: #888;
    font-size: 0.875rem;
}

/* Button Styling */
button {
    background-color: #4CAF50; /* Green for the save button */
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.125rem;
    width: 100%;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Form Actions - Button Wrapper */
.form-actions {
    text-align: center;
}

</style>
<body>

    <div class="settings-container">
        <h2>Pengaturan Website</h2>

        <form action="simpan_pengaturan.php" method="POST" enctype="multipart/form-data">
            
            <div class="setting-item">
                <label for="site-title">Judul Website</label>
                <input type="text" id="site-title" name="site-title" placeholder="Masukkan judul website" required>
            </div>

            <div class="setting-item">
                <label for="logo">Logo Website</label>
                <input type="file" id="logo" name="logo" accept="image/*" required>
                <small>Format file: JPG, PNG, Max size: 2MB</small>
            </div>

            <div class="form-actions">
                <button type="submit">Simpan Pengaturan</button>
            </div>
        </form>
    </div>

</body>
</html>
