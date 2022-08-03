<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5 mb-2 text-center">
                <h1>Tambah Data Siswa</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" aria-describedby="NIS" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="Email">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" aria-describedby="Jurusan" required>
                    </div>
                    <div class="mb-5">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input class="form-control" type="file" name="gambar" id="gambar">
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>