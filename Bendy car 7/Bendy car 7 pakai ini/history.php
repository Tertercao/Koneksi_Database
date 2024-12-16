<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!'); window.location='login.php';</script>";
    exit;
}

require 'db_connection.php'; // Sesuaikan nama file koneksi Anda

$query = "SELECT t.id, t.tanggal_pinjam, t.tanggal_kembali, t.denda, 
                 u.nama AS user, k.nama_kendaraan 
          FROM transaksi t
          JOIN users u ON t.user_id = u.id
          JOIN kendaraan k ON t.kendaraan_id = k.id
          ORDER BY t.tanggal_pinjam DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <style>
        table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
}

table thead tr {
    background-color:rgb(79, 88, 87);
    color: #fff;
    text-align: center;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

    </style>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1>History Transaksi</h1>
        <div>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            </ul>
        </nav>
    </div>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama User</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user']; ?></td>
                        <td><?php echo $row['nama_kendaraan']; ?></td>
                        <td><?php echo $row['tanggal_pinjam']; ?></td>
                        <td><?php echo $row['tanggal_kembali']; ?></td>
                        <td>Rp. <?php echo number_format($row['denda'], 0, ',', '.'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    <footer>
    <p>&copy; 2024 PT BendyCar | All Rights Reserved</p>
</footer>
</body>
</html>
