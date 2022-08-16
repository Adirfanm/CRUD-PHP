<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$siswa = query("SELECT * FROM siswa");

// tombol cari diklik

if (isset($_POST["cari"])) {
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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .load {
            width: 35px;
            position: absolute;
            top: 0;
            right: -35px;
            display: none;
        }

        @media screen and (max-width: 576px) {
            .table-row {
                min-width: 100vw;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media print {

            .logout,
            .tambah,
            .search,
            .aksi {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row mt-4 my-4">
            <div class="col">
                <h1>Daftar Siswa </h1>
            </div>
            <div class="col d-flex flex-row-reverse mt-2">
                <a href="print.php" target="_blank" class="mx-1">Print</a> |
                <a href="logout.php" class="logout mx-1">Logout</a>
            </div>
        </div>

        <!-- tombol tambah data -->
        <a href="tambah.php" class="tambah btn btn-success">Tambah Data Siswa</a>
        <!-- live search fitur-->
        <form action="" method="post" class="search">
            <div class="col-10 col-md-6 position-relative">
                <div class="input-group my-3">
                    <input type="text" class="form-control" name="keyword" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
                    <button class="btn btn-primary" type="submit" name="cari" id="tombol-cari">Cari</button>
                    <img src="img/load.gif" class="load">
                </div>
            </div>
        </form>

        <div class="row table-row overflow-scroll" id="table-row">
            <table class="table table-responsive table-striped">
                <tr>
                    <th>No.</th>
                    <th class="aksi">Aksi</th>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                </tr>
                <?php $i = 1;  ?>
                <?php foreach ($siswa as $row) : ?>
                    <tr>
                        <td><?= $i  ?></td>
                        <td class="aksi">
                            <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-outline-info px-3">Ubah</a>
                            <a href="hapus.php?id=<?= $row["id"];  ?>" class="btn btn-outline-secondary" onclick="return confirm('yakin ingin menghapus?');">Hapus</a>
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
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>