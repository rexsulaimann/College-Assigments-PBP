<?php
// Menyertakan file koneksi
include '../conn/conn.php'; // Sesuaikan path dengan lokasi file conn.php

// Mulai session
session_start();

// Menangani data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data POST ada
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
        // Mendapatkan data dari form
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validasi input
        if (empty($email) || empty($username) || empty($password)) {
            // Jika ada field yang kosong, simpan error dan hancurkan session
            $_SESSION['error'] = "All fields are required.";
            session_destroy(); // Hancurkan session
            header("Location: ../index.php"); // Arahkan ke halaman sebelumnya
            exit();
        }

        // Query untuk memasukkan data ke tabel users
        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Mendapatkan ID dari user yang baru saja ditambahkan
            $userId = $conn->insert_id;  // ID yang baru saja dimasukkan oleh auto-increment

            // Ambil data user, termasuk role dari database
            $getUserSql = "SELECT role FROM users WHERE id = $userId";
            $result = $conn->query($getUserSql);

            if ($result->num_rows > 0) {
                // Ambil role dari hasil query
                $user = $result->fetch_assoc();
                $role = $user['role'];

                // Setelah registrasi sukses, set session
                $_SESSION['id'] = $userId;     // Menyimpan ID user ke dalam session
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $role; // Menambahkan session role

                // Redirect ke halaman user_dashboard.php
                header("Location: ../page-user/user_dashboard.php "); // Pastikan ada halaman user_dashboard.php
                exit(); // Pastikan script berhenti setelah redirect
            } else {
                // Jika data user tidak ditemukan
                $_SESSION['error'] = "User data not found.";
                session_destroy(); // Hancurkan session
                header("Location: ../index.php"); // Arahkan kembali ke halaman index
                exit();
            }
        } else {
            // Jika terjadi error, simpan error, hancurkan session, dan redirect ke index.php
            $_SESSION['error'] = "Error: " . $conn->error;
            session_destroy(); // Hancurkan session
            header("Location: ../index.php"); // Arahkan kembali ke halaman index
            exit();
        }
    } else {
        // Jika data POST tidak ada
        $_SESSION['error'] = "Form data is missing.";
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}

// Menutup koneksi
$conn->close();
?>