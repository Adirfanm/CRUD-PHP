<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
// ambil data di URL
$id = $_GET["id"];

// query data siswa berdasarkan id nya
$siw = query("SELECT * FROM siswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


    // cek apakah data berhasil ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal diubah');
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
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-md-5 text-center">
            <h1>Edit Data Siswa</h1>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $siw["id"]; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $siw["gambar"]; ?>">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nis" required value="<?= $siw["nis"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $siw["nama"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $siw["email"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $siw["jurusan"]; ?>">
                    </div>
                    <div class="mb-5">
                        <div class="d-flex flex-column mb-md-3">
                            <label for="gambar">Gambar saat ini</label>
                            <img src="img/<?= $siw["gambar"]; ?>" alt="" width="75px">
                        </div>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" name="submit" class="btn btn-success">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</body>

</html>