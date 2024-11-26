<?php include 'db_connection.php'; ?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaksi_id = $_POST['transaksi_id'];
    $tanggal_kembali = date('Y-m-d');

    $query = "SELECT * FROM transaksi WHERE id = '$transaksi_id'";
    $result = $conn->query($query);
    $transaksi = $result->fetch_assoc();

    $tanggal_pinjam = $transaksi['tanggal_pinjam'];
    $durasi = (strtotime($tanggal_kembali) - strtotime($tanggal_pinjam)) / (60 * 60 * 24);

    $denda = 0;
    if ($durasi > $transaksi['durasi']) {
        $denda = ($durasi - $transaksi['durasi']) * $transaksi['denda_per_hari'];
    }

    $query_update = "UPDATE transaksi SET tanggal_kembali = '$tanggal_kembali', denda = '$denda' WHERE id = '$transaksi_id'";
    $conn->query($query_update);

    echo "<script>alert('Pengembalian berhasil! Denda: Rp ' + $denda); window.location='pengembalian.php';</script>";
}
$query = "SELECT * FROM transaksi WHERE status = 'dipinjam'";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Kendaraan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><i class="fas fa-car"></i> PT BendyCar</h1>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="catalog.php"><i class="fas fa-car-side"></i> Vehicles</a></li>
                <li><a href="pengembalian.php" class="active"><i class="fas fa-undo"></i> Returns</a></li>
                <li><a href="manage.php"><i class="fas fa-tasks"></i> Manage</a></li>
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
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nama_kendaraan'] ?></td>
                        <td><?= $row['tanggal_pinjam'] ?></td>
                        <td><?= $row['durasi'] ?></td
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
