<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kendaraan = $_POST['nama_kendaraan'];
    $harga_sewa = $_POST['harga_sewa'];
    $status = $_POST['status'];

    $query = "INSERT INTO kendaraan (nama_kendaraan, harga_sewa, status) VALUES ('$nama_kendaraan', '$harga_sewa', '$status')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Kendaraan berhasil ditambahkan!'); window.location='manage.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 style="display: flex; justify-content: center;">Tambah Kendaraan Baru</h1>
        <form action="add_kendaraan.php" method="POST">
            <label for="nama_kendaraan">Nama Kendaraan:</label>
            <input type="text" name="nama_kendaraan" id="nama_kendaraan" required>

            <label for="harga_sewa">Harga Sewa:</label>
            <input type="number" name="harga_sewa" id="harga_sewa" required>

            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="available">Tersedia</option>
                <option value="unavailable">Tidak Tersedia</option>
            </select>

            <button type="submit" class="btn primary">Tambah Kendaraan</button>
            <a href="manage.php" class="btn secondary">Kembali</a>
        </form>
    </div>
    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>
