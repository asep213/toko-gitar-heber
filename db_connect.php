<?php
$servername = "localhost"; // Ganti jika host database Anda berbeda
$username = "root";     // Username default XAMPP MySQL
$password = "";         // Password default XAMPP MySQL (kosong)
$dbname = "toko_gitar_db"; // Nama database yang Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
// echo "Koneksi database berhasil!"; // Anda bisa mengaktifkan ini untuk menguji koneksi
?>