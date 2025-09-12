<!-- Halaman Utama -->
<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>
    <h2>Daftar Siswa</h2>
    <a href="tambah.php">+ Tambah Siswa</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM siswa");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><img src="uploads/<?= $d['foto']; ?>" width="60"></td>
            <td><?= $d['kelas']; ?></td>
            <td><?= $d['jurusan']; ?></td>
            <td><?= $d['email']; ?></td>
            <td><?= $d['no_hp']; ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id_siswa']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $d['id_siswa']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>