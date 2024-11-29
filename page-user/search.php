<?php
// Koneksi ke database
include '../conn/conn.php'; // File koneksi database

// Ambil data dari tabel `users`
$query = "SELECT * FROM users WHERE role = 'user'";
$result = $conn->query($query);

if (!$result) {
    die("Query Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Data Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            color: #000;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h2>Data Pengguna</h2>
<input type="text" id="searchInput" placeholder="Cari berdasarkan nama, username, atau email" onkeyup="filterTable()">

<table id="dataTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['id']); ?></td>

        <!-- Periksa jika first_name kosong atau NULL -->
        <td><?php echo !empty($row['first_name']) ? htmlspecialchars($row['first_name']) : '-'; ?></td>

        <!-- Periksa jika last_name kosong atau NULL -->
        <td><?php echo !empty($row['last_name']) ? htmlspecialchars($row['last_name']) : '-'; ?></td>

        <!-- Periksa jika age kosong atau NULL -->
        <td><?php echo !empty($row['age']) ? htmlspecialchars($row['age']) : '-'; ?></td>

        <!-- Periksa jika gender kosong atau NULL -->
        <td><?php echo !empty($row['gender']) ? htmlspecialchars($row['gender']) : '-'; ?></td>

        <!-- Periksa jika birth_date kosong atau NULL -->
        <td><?php echo !empty($row['birth_date']) ? htmlspecialchars($row['birth_date']) : '-'; ?></td>

        <!-- Periksa jika email kosong atau NULL -->
        <td><?php echo !empty($row['email']) ? htmlspecialchars($row['email']) : '-'; ?></td>

        <!-- Periksa jika phone kosong atau NULL -->
        <td><?php echo !empty($row['phone']) ? htmlspecialchars($row['phone']) : '-'; ?></td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<script>
    function filterTable() {
        // Ambil input dari search bar
        var input = document.getElementById("searchInput");
        var filter = input.value.toLowerCase();
        var table = document.getElementById("dataTable");
        var tr = table.getElementsByTagName("tr");

        // Loop melalui semua baris tabel, dan sembunyikan baris yang tidak cocok
        for (var i = 1; i < tr.length; i++) { // Mulai dari indeks 1 karena indeks 0 adalah header
            var tdArray = tr[i].getElementsByTagName("td");
            var match = false;

            // Cek setiap kolom di baris
            for (var j = 0; j < tdArray.length; j++) {
                if (tdArray[j] && tdArray[j].innerText.toLowerCase().includes(filter)) {
                    match = true;
                    break;
                }
            }

            // Tampilkan atau sembunyikan baris
            tr[i].style.display = match ? "" : "none";
        }
    }
</script>

</body>
</html>
