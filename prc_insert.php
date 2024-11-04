<?php
include "conn.php";

// Mendapatkan data dari form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password']; 
$age = $_POST['age'];
$gender = $_POST['gender'];
$birth_date = $_POST['birth_date'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Menyimpan data ke dalam tabel users
$sql = "INSERT INTO users (first_name, last_name, username, password, age, gender, birth_date, email, phone)
VALUES ('$first_name', '$last_name', '$username', '$password', '$age', '$gender', '$birth_date', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil!";
    header("Location: index.php"); // Mengarahkan kembali ke halaman index.php
    exit(); // Menghentikan eksekusi lebih lanjut setelah redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
