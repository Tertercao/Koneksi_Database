<?php include 'db_connection.php'; ?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='login.php';</script>";
}
$query = "SELECT * FROM kendaraan WHERE status = 'available'";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Kendaraan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1><i class="fas fa-car"></i> PT BendyCar</h1>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="catalog.php" class="active"><i class="fas fa-car-side"></i> Vehicles</a></li>
                <li><a href="pengembalian.php"><i class="fas fa-undo"></i> Returns</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                    <li><a href="manage.php"><i class="fas fa-tasks"></i>Manage</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Katalog Kendaraan</h2>
        <div class="vehicle-catalog">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="vehicle-card">
                    <h3><?php echo $row['nama_kendaraan']; ?></h3>
                    <p>Harga: Rp. <?php echo number_format($row['harga_sewa'], 0, ',', '.'); ?>/hari</p>
                    <form action="pinjam.php" method="POST">
                        <input type="hidden" name="kendaraan_id" value="<?php echo $row['id']; ?>">
                        <i class="fas fa-car" style="font-size: 30px; color: #2c3e50;"></i>
                        <button type="submit">Pinjam</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </main>
    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>