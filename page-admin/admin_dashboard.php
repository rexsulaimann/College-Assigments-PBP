<?php
// Memulai session
session_start();

// Mengecek apakah pengguna sudah login dan memiliki role 'admin'
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    // Jika tidak login atau bukan admin, arahkan ke halaman login
    header("Location: ../index.php");
    exit;
}

// Jika sudah login dan role adalah admin, tampilkan dashboard admin
// echo "Welcome, Admin " . $_SESSION['username'];
// ganti tulisan diatas dengan sweetalert

?>

<!DOCTYPE html>
<html>
<head>
  <title>mywebsite</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
  <div id="container">
    <div id="header">
        <h1>PERTEMUAN I - SISTEM PAKAR</h1>
    </div>

    <div id="sidebar">
      <h3>navigasi</h3>
      <ul id="navmenu">
        <li><a href="?module=view#pos" class="selected">View</a></li>
        <li><a href="?module=insert#pos">Insert </a></li>
        <li><a href="?module=search#pos">Search</a></li>
        <li><a href="../prc/prc_logout.php" class="selected">Logout</a></li>
      </ul>
    </div>

    <div id="page">
      
    <?php 
    if(isset($_GET['module'])) 
    include "$_GET[module].php";
  else 
    include "view.php";
    ?>

    </div>

    <div id="clear"></div>

    <div id="footer">
      <p>&copy; 2010</p>
    </div>
  </div>
</body>
</html>