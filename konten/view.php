<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "kosong123";
$dbname = "pbp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus data jika ada permintaan
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    if ($conn->query("DELETE FROM users WHERE id='$delete_id'") === TRUE) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location = '/?module=view#pos';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data: " . $conn->error . "');
            window.location = '/?module=view#pos';
        </script>";
    }
}

// Ambil data dari database
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
        }
        a.edit {
            background-color: #4CAF50;
        }
        a.delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>

<h2>Data Pengguna</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
        <th>Username</th>
        <th>Usia</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['birth_date']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
    <a class="edit" href="index.php?module=edit&id=<?php echo $row['id']; ?>">Edit</a>

    <a class="delete" href="/?module=view&delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
            </td>

<style>
    a.edit,
    a.delete {
        display: inline-block; /* Pastikan tombol berada dalam satu baris */
        margin-right: 10px; /* Tambahkan jarak antar tombol */
    }
</style>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
