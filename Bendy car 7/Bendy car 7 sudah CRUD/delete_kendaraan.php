<?php
session_start();
require_once 'db_connection.php'; // Sambungkan ke database

// Pastikan hanya admin yang bisa mengakses
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Query hapus kendaraan
    $query = "DELETE FROM kendaraan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data kendaraan berhasil dihapus!'); window.location='manage.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data kendaraan.'); window.location='manage.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Metode tidak valid!'); window.location='manage.php';</script>";
}
