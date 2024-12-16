<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM kendaraan WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$kendaraan = $result->fetch_assoc();

if (!$kendaraan) {
    echo "<script>alert('Kendaraan tidak ditemukan!'); window.location='manage.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>Edit Data Kendaraan</h1>
    <form action="update_kendaraan.php" method="POST">
        <input type="hidden" name="id" value="<?= $kendaraan['id'] ?>">
        <label for="nama_kendaraan">Nama Kendaraan:</label>
        <input type="text" name="nama_kendaraan" id="nama_kendaraan" value="<?= $kendaraan['nama_kendaraan'] ?>" required>
        
        <label for="harga_sewa">Harga Sewa (per hari):</label>
        <input type="number" name="harga_sewa" id="harga_sewa" value="<?= $kendaraan['harga_sewa'] ?>" required>
        
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="available" <?= $kendaraan['status'] == 'available' ? 'selected' : '' ?>>Available</option>
            <option value="not available" <?= $kendaraan['status'] == 'not available' ? 'selected' : '' ?>>Not Available</option>
        </select>

        <button type="submit" class="btn primary">Simpan Perubahan</button>
        <a href="manage.php" class="btn danger">Batal</a>
    </form>

    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>
