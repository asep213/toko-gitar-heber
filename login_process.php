<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password']; // Password yang dimasukkan pengguna

    if (empty($username_or_email) || empty($password)) {
        $_SESSION['error_message'] = "Username/Email dan Password harus diisi.";
        header("Location: index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_or_email, $username_or_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // --- PASTIKAN BARIS INI DIGUNAKAN (perbandingan langsung): ---
        if ($password === $user['password']) { // <--- GANTI 'password_verify' dengan perbandingan LANGSUNG
        // --- DAN PASTIKAN BARIS INI TIDAK ADA ATAU DIKOMENTARI: ---
        // if (password_verify($password, $user['password'])) { // <--- HAPUS ATAU KOMENTARI BARIS INI

            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            $_SESSION['success_message'] = "Selamat datang, " . htmlspecialchars($user['username']) . "!";
            header("Location: index.php");
        } else {
            $_SESSION['error_message'] = "Password salah.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['error_message'] = "Username atau Email tidak ditemukan.";
        header("Location: index.php");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>