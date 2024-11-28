<?php
// Memulai session
session_start();

// Meng-include koneksi database
include "../conn/conn.php";

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $sql = "SELECT * FROM users WHERE username = ?";
    
    // Menyiapkan statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // "s" untuk string (username)

    // Eksekusi query
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah username ditemukan
    if ($result->num_rows > 0) {
        // Ambil data user
        $user = $result->fetch_assoc();

        // Verifikasi password (gunakan password_verify jika password di-hash)
        if ($user['password'] == $password) { // Anda bisa mengganti ini dengan password_verify jika password di-hash
            // Menyimpan data pengguna ke session
            $_SESSION['username'] = $user['username'];  // Simpan username
            $_SESSION['role'] = $user['role'];  // Simpan role (admin/user)
            $_SESSION['user_id'] = $user['id']; // Simpan ID pengguna (opsional)

            // Tentukan role (admin atau user)
            if ($user['role'] == 'admin') {
                // Arahkan ke halaman admin
                header("Location: ../page-admin/admin_dashboard.php");
            } else {
                // Arahkan ke halaman user
                header("Location: ../page-user/user_dashboard.php");
            }
            exit; // Hentikan eksekusi setelah header
        } else {
            // Jika password salah
            header("Location: ../index.php?error=invalid_credentials");
            exit;
        }
    } else {
        // Jika username tidak ditemukan
        header("Location: ../index.php?error=invalid_credentials");
        exit;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
