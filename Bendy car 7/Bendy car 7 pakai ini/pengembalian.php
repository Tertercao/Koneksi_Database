<?php
include 'db_connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['transaksi_id'])) {
        $transaksi_id = intval($_POST['transaksi_id']);
        
        $updateTransaksiQuery = "UPDATE transaksi SET status = 'dikembalikan' WHERE id = ?";
        $stmtTransaksi = $conn->prepare($updateTransaksiQuery);
        $stmtTransaksi->bind_param("i", $transaksi_id);
        $stmtTransaksi->execute();
        $stmtTransaksi->close();

        $updateKendaraanQuery = "UPDATE kendaraan SET status = 'available' WHERE id = (SELECT kendaraan_id FROM transaksi WHERE id = ?)";
        $stmtKendaraan = $conn->prepare($updateKendaraanQuery);
        $stmtKendaraan->bind_param("i", $transaksi_id);
        $stmtKendaraan->execute();
        $stmtKendaraan->close();

        echo "<script>alert('Pengembalian berhasil diproses!'); window.location='pengembalian.php';</script>";
    }
}

$query = "SELECT t.*, k.nama_kendaraan 
          FROM transaksi t
          JOIN kendaraan k ON t.kendaraan_id = k.id
          WHERE t.status = 'dipinjam'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Kendaraan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1><i class="fas fa-car"></i> PT BendyCar</h1>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="catalog.php"><i class="fas fa-car-side"></i> Vehicles</a></li>
                <li><a href="pengembalian.php" class="active"><i class="fas fa-undo"></i> Returns</a></li>
                <!--<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>-->
            </ul>
        </nav>
    </header>
    <main>
        <h2>Pengembalian Kendaraan</h2>
        <table>
            <thead>
                <tr>
                    <th>Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= isset($row['nama_kendaraan']) ? htmlspecialchars($row['nama_kendaraan']) : 'Tidak tersedia' ?></td>
                        <td><?= htmlspecialchars($row['tanggal_pinjam']) ?></td>
                        <td><?= isset($row['durasi']) ? $row['durasi'] . ' hari' : 'Tidak tersedia' ?></td>
                        <td>
                            <form action="pengembalian.php" method="POST">
                                <input type="hidden" name="transaksi_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn">Kembalikan</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>
