<?php include 'db_connection.php'; ?>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Hanya admin yang dapat mengakses halaman ini!'); window.location='login.php';</script>";
}
$query = "SELECT * FROM kendaraan";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Kendaraan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <li><a href="pengembalian.php"><i class="fas fa-undo"></i> Returns</a></li>
                <li><a href="manage.php" class="active"><i class="fas fa-tasks"></i> Manage</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Kelola Kendaraan</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kendaraan</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama_kendaraan'] ?></td>
                        <td><?= $row['tipe_kendaraan'] ?></td>
                        <td>Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?>/hari</td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <form action="edit_kendaraan.php" method="GET" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn">Edit</button>
                            </form>
                            <form action="delete_kendaraan.php" method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="add_kendaraan.php" class="btn">Tambah Kendaraan</a>
    </main>
    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>
