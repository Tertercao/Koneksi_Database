<?php include 'db_connection.php'; ?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
    exit;
}

if ($_SESSION['user']['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak! Anda bukan admin.'); window.location='catalog.php';</script>";
    exit;
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
                <li><a href="catalog.php"><i class="fas fa-car-side"></i> Vehicles</a></li>
                <li><a href="pengembalian.php"><i class="fas fa-undo"></i> Returns</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                    <!--<li><a href="manage.php"><i class="fas fa-tasks"></i>Manage</a></li>-->
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php endif; ?>
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
                    <th>Harga</th>
                    <th>Aksi</th>
                    <th><div style="display: flex; gap: 10px; justify-content: center;">
                    <a href="add_kendaraan.php" class="btn primary" style="margin-bottom: 10px;">Tambah Kendaraan</a>
                    </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama_kendaraan'] ?></td>
                        <td>Rp <?= number_format($row['harga_sewa'], 0, ',', '.') ?>/hari</td>
                        <td><?= $row['status'] ?></td>
                        <td>
                        <div style="display: flex; gap: 10px; justify-content: center;">
                        <form action="edit_kendaraan.php" method="GET" style="margin: 0;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn primary">Edit</button>
                        </form>
                        <form action="delete_kendaraan.php" method="POST" style="margin: 0;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn danger">Hapus</button>
                        </form>
                        </div>
                        </td>
                    </tr>
                <?php endwhile; 
                ?>
            </tbody>
        </table>
        
    </main>
    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>
