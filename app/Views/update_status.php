<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'todolist';
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Koneksi gagal: ' . $conn->connect_error]));
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "UPDATE tugas SET status = IF(status='Selesai', 'Belum Selesai', 'Selesai') WHERE id_tugas = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
}

$conn->close();
?>
