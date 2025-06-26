<?php
$host = "localhost";      // Server database
$user = "root";           // Username default XAMPP
$pass = "";               // Password dikosongin kalau pakai XAMPP
$db   = "akun_login";     // Nama database yang kamu buat tadi

// Buat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi berhasil atau tidak
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>