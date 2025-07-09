<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Ambil password langsung dari form

    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Semua field harus diisi.";
        header("Location: index.php");
        exit();
    }

    // --- PASTIKAN BARIS INI TIDAK ADA ATAU DIKOMENTARI: ---
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT); // <--- HAPUS ATAU KOMENTARI BARIS INI

    // Gunakan $password langsung dalam prepared statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    // 'sss' menunjukkan bahwa ketiga parameter adalah string
    $stmt->bind_param("sss", $username, $email, $password); // <--- PASTIKAN MENGGUNAKAN $password (bukan $hashed_password)

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registrasi berhasil! Silakan login.";
        header("Location: index.php");
    } else {
        if ($conn->errno == 1062) {
            $_SESSION['error_message'] = "Username atau Email sudah terdaftar. Silakan gunakan yang lain.";
        } else {
            $_SESSION['error_message'] = "Error registrasi: " . $stmt->error;
        }
        header("Location: index.php");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>