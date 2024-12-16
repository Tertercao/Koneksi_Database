<?php include 'db_connection.php'; ?>
<?php session_start(); ?>
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
    <div>
        <h1><i class="fas fa-car"></i> PT BendyCar</h1>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <!--<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li> -->
                <li><a href="catalog.php"><i class="fas fa-car-side"></i> Vehicles</a></li>
            <!-- <li><a href="pengembalian.php"><i class="fas fa-undo"></i> Returns</a></li> -->
             

            <?php if (isset($_SESSION['user'])): ?>
    <?php if ($_SESSION['user']['role'] == 'admin'): ?>
        <li><a href="manage.php"><i class="fas fa-tasks"></i>Manage</a></li>
        <li><a href="history.php"><i class="fas fa-history"></i>History</a></li>
    <?php endif; ?>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
<?php else: ?>
    <li><a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a></li>
<?php endif; ?>



            </ul>
        </nav>
    </div>
</header>
<main>
    <section class="hero">
    <h2>Selamat Datang di PT BendyCar</h2>
    <p>Menyediakan solusi transportasi terbaik untuk Anda!</p>
    </section>
    <video autoplay loop muted playsinline class="background-video">
        <source src="Toyota_Supra-Cinematic.mp4" type="video/mp4">
        Browser Anda tidak mendukung video background.
    </video>
</main>
<footer>
    <p>© 2024 PT BendyCar | All Rights Reserved</p>
</footer>
</body>
</html>