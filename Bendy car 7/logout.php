<?php
session_start();
// session_unset(); // Hapus semua variabel sesi
session_destroy();
header("Location: login.php");
exit();
?>
