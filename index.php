<?php
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$siswa = query("SELECT * FROM siswa");

// tombol cari diklik
if ( isset($_POST["cari"]) ) {
    $siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .load {
            width: 35px;
            position: absolute;
            top: 137px;
            display: none;
        }

        @media print {
            .logout, .tambah, .search, .aksi {
                display: none;
            }
        }

    </style>
</head>
<body>

    <a href="logout.php" class="logout">Logout</a> | <a href="print.php" target="_blank">Print</a>

    <h1>Daftar Siswa </h1>

    <a href="tambah.php" class="tambah">Tambah Data Siswa</a>
    <br><br>

    <form action="" method="post" class="search">
        <input type="text" name="keyword" size="35px"
         autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/load.gif" class="load">

    </form>

<br><br>

<div id="container">
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th class="aksi">Aksi</th>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i= 1;  ?>
        <?php foreach ($siswa as $row ) : ?>
        
        <tr>
            <td><?= $i  ?></td>
            <td class="aksi">
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"];  ?>" onclick="return confirm('yakin ingin menghapus?');">Hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="100px"></td>
            <td><?= $row["nis"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach;  ?>

    </table>
</div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>