<?php

include "../conn/conn.php";

// Ambil username dari sesi
$username = $_SESSION['username'];

// Query untuk mengambil data pengguna berdasarkan username
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    
    $username = $data['username'];
        // Query untuk mengambil data pengguna berdasarkan username
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
    // dan seterusnya
} else {
    echo "Tidak ada data pengguna yang ditemukan.";
}

// Ambil username dari sesi






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
        WHERE id='{$data['id']}'") === TRUE) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href = 'user_dashboard.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui data: " . $conn->error . "');
            window.location.href = 'user_dashboard.php';
        </script>";
    }
}
?>

<h2 style="text-align: center; margin-bottom: 20px;">Edit Data Pengguna</h2>
<div style="display: flex; justify-content: center;">
    <form method="POST" action="" style="width: 80%; max-width: 800px; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 15px;">
            <label for="first_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Depan:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $data['first_name']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="last_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Belakang:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $data['last_name']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="username" style="display: block; font-weight: bold; margin-bottom: 5px;">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" readonly>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $data['password']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="age" style="display: block; font-weight: bold; margin-bottom: 5px;">Usia:</label>
            <input type="number" id="age" name="age" value="<?php echo $data['age']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="gender" style="display: block; font-weight: bold; margin-bottom: 5px;">Jenis Kelamin:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $data['gender']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="birth_date" style="display: block; font-weight: bold; margin-bottom: 5px;">Tanggal Lahir:</label>
            <input type="date" id="birth_date" name="birth_date" value="<?php echo $data['birth_date']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="phone" style="display: block; font-weight: bold; margin-bottom: 5px;">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $data['phone']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div style="display: flex; justify-content: space-between;">
            <button type="submit" style="padding: 10px 20px; font-size: 16px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Simpan Perubahan</button>
            
        </div>
    </form>
</div>