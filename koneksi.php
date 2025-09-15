<!-- Halaman Koneksi Database -->
<?php
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "belajar_github";

$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
// echo "Koneksi Berhasil";
?>