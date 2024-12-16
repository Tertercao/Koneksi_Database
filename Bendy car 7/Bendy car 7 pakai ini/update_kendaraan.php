<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_kendaraan = $_POST['nama_kendaraan'];
    $harga_sewa = $_POST['harga_sewa'];
    $status = $_POST['status'];

    $query = "UPDATE kendaraan SET nama_kendaraan = ?, harga_sewa = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sisi', $nama_kendaraan, $harga_sewa, $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data kendaraan berhasil diperbarui!'); window.location='manage.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data kendaraan.'); window.location='manage.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Metode tidak valid!'); window.location='manage.php';</script>";
}
