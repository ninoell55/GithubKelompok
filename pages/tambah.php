<!-- Halaman Tambah -->
<?php include "../koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family:Arial, sans-serif; background:#f2f2f2; padding:30px;
        }
        .form-container {
            max-width:500px; margin:auto; background:white; padding:20px;
            border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width:100%; padding:10px; margin:8px 0; border:1px solid #ccc; border-radius:4px;
        }
        button {
            background:#28a745; color:white; padding:10px 15px; border:none; border-radius:4px; cursor:pointer;
        }
        button:hover {
            background:#218838;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Siswa</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Kelas</label>
        <input type="text" name="kelas" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>No HP</label>
        <input type="text" name="no_hp" required>

        <label>Foto</label>
        <input type="file" name="foto" accept="image/*" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas   = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp   = mysqli_real_escape_string($conn, $_POST['no_hp']);

    
    $folder = "uploads/";
    if (!is_dir($folder)) { mkdir($folder, 0777, true); }

    $fotoAsli = $_FILES['foto']['name'];
    $tmpFoto  = $_FILES['foto']['tmp_name'];
    $ext      = pathinfo($fotoAsli, PATHINFO_EXTENSION);
    $namaFoto = uniqid("siswa_").".".$ext;

    if (move_uploaded_file($tmpFoto, $folder.$namaFoto)) {
        $sql = "INSERT INTO siswa (nama, foto, kelas, jurusan, email, no_hp)
                VALUES ('$nama','$namaFoto','$kelas','$jurusan','$email','$no_hp')";
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green;text-align:center;'>Data siswa berhasil ditambahkan!</p>";
        } else {
            echo "<p style='color:red;text-align:center;'>Gagal simpan ke database: ".mysqli_error($conn)."</p>";
        }
    } else {
        echo "<p style='color:red;text-align:center;'>Upload foto gagal.</p>";
    }
}
?>
</body>
</html>
