<!-- Halaman Hapus -->
<?php
require_once '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM siswa WHERE id_siswa = '$id'";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    $error = "gagal menghapus" ;
} 