<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT BendyCar - Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
        <h1><i class="fas fa-car"></i> PT BendyCar</h1>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="catalog.php"><i class="fas fa-car-side"></i> Vehicles</a></li>
                <li><a href="pengembalian.php"><i class="fas fa-undo"></i> Returns</a></li>
                <li><a href="manage.php"><i class="fas fa-tasks"></i> Manage</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h2>Selamat Datang di PT BendyCar</h2>
            <p>Menyediakan solusi transportasi terbaik untuk Anda!</p>
            <a href="catalog.php" class="btn">Lihat Kendaraan</a>
        </section>
    </main>
    <footer>
        <p>© 2024 PT BendyCar | All Rights Reserved</p>
    </footer>
</body>
</html>