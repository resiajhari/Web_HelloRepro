<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$password = "";
$dbname = "akun_login";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Koneksi gagal: " . $conn->connect_error]);
    exit();
}

$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Cek apakah email sudah digunakan
$check = $conn->prepare("SELECT id FROM user WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Email sudah terdaftar"]);
    exit();
}

// Simpan data ke tabel user
$stmt = $conn->prepare("INSERT INTO user (name, age, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $name, $age, $email, $password);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menyimpan data"]);
}

$conn->close();
?>
