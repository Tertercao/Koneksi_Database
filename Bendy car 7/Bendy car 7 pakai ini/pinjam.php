<?php include 'db_connection.php'; ?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kendaraan_id = $_POST['kendaraan_id'];
    $user_id = $_SESSION['user']['id'];
    $tanggal_pinjam = date('Y-m-d');
    $query = "INSERT INTO transaksi (user_id, kendaraan_id, tanggal_pinjam, status) VALUES ('$user_id', '$kendaraan_id', '$tanggal_pinjam', 'dipinjam')";

    if ($conn->query($query) === TRUE) {
        $updateKendaraan = "UPDATE kendaraan SET status = 'unavailable' WHERE id = '$kendaraan_id'";
        $conn->query($updateKendaraan);
        echo "<script>alert('Kendaraan berhasil dipinjam!'); window.location='catalog.php';</script>";
    } else {
        echo "<script>alert('Gagal meminjam kendaraan!');</script>";
    }
}
?>