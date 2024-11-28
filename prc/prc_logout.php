<?php
// Memulai session
session_start();

// Menghancurkan session
session_unset();
session_destroy();

// Mengarahkan pengguna ke halaman login
header("Location: ../index.php");
exit;
?>
