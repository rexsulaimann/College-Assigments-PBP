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

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id='$id'");
    $data = $result->fetch_assoc();
}

// Update data ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if ($conn->query("UPDATE users SET 
        first_name='$first_name',
        last_name='$last_name',
        username='$username',
        password='$password',
        age='$age',
        gender='$gender',
        birth_date='$birth_date',
        email='$email',
        phone='$phone'
        WHERE id='$id'") === TRUE) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href = 'http://11220910000104.test/index.php?module=view#pos';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui data: " . $conn->error . "');
            window.location.href = 'http://11220910000104.test/index.php?module=view#pos';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        form {
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .cancel {
            background-color: #f44336;
            margin-left: 10px;
        }
        .cancel:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Edit Data Pengguna</h2>
    <form method="POST" action="">
        <label>Nama Depan:</label>
        <input type="text" name="first_name" value="<?php echo $data['first_name']; ?>" required>

        <label>Nama Belakang:</label>
        <input type="text" name="last_name" value="<?php echo $data['last_name']; ?>" required>

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $data['username']; ?>" required>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $data['password']; ?>" required>

        <label>Usia:</label>
        <input type="number" name="age" value="<?php echo $data['age']; ?>" required>

        <label>Jenis Kelamin:</label>
        <input type="text" name="gender" value="<?php echo $data['gender']; ?>" required>

        <label>Tanggal Lahir:</label>
        <input type="date" name="birth_date" value="<?php echo $data['birth_date']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required>

        <label>Nomor Telepon:</label>
        <input type="tel" name="phone" value="<?php echo $data['phone']; ?>" required>

        <button type="submit">Simpan Perubahan</button>
        <a href="http://11220910000104.test/index.php?module=view#pos" class="cancel" style="text-decoration:none; color:white; padding:10px 20px; display:inline-block;">Batal</a>
    </form>
</body>
</html>
