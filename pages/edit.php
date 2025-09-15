<?php
include '../koneksi.php';

$id_siswa = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
$siswa = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama    = $_POST['nama'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $email   = $_POST['email'];
    $no_hp   = $_POST['no_hp'];

    if ($_FILES['foto']['name'] != '') {
        $foto   = time() . "_" . $_FILES['foto']['name'];
        $tmp    = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $foto);

        if ($siswa['foto'] != '' && file_exists("uploads/" . $siswa['foto'])) {
            unlink("uploads/" . $siswa['foto']);
        }
    } else {
        $foto = $siswa['foto'];
    }

    mysqli_query($conn, "UPDATE siswa SET 
        nama='$nama',
        foto='$foto',
        kelas='$kelas',
        jurusan='$jurusan',
        email='$email',
        no_hp='$no_hp'
        WHERE id_siswa='$id_siswa'");

    header("Location: index.php?pesan=update_berhasil");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Siswa</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Nama</label><br>
        <input type="text" name="nama" value="<?= $siswa['nama'] ?>" required><br><br>

        <label>Foto</label><br>
        <input type="file" name="foto"><br>
        <?php if ($siswa['foto']): ?>
            <img src="uploads/<?= $siswa['foto'] ?>" alt="foto" width="120"><br>
        <?php endif; ?>
        <br>

        <label>Kelas</label><br>
        <input type="text" name="kelas" value="<?= $siswa['kelas'] ?>"><br><br>

        <label>Jurusan</label><br>
        <input type="text" name="jurusan" value="<?= $siswa['jurusan'] ?>"><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="<?= $siswa['email'] ?>"><br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp" value="<?= $siswa['no_hp'] ?>"><br><br>

        <button type="submit" name="update">Simpan</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>