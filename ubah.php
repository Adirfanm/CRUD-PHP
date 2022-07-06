<?php
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
// ambil data di URL
$id = $_GET["id"];

// query data siswa berdasarkan id nya
$siw = query("SELECT * FROM siswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    

    // cek apakah data berhasil ubah atau tidak
    if ( ubah($_POST) > 0 ) {
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
</head>
<body>
    <h1>Edit Data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siw["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $siw["gambar"]; ?>">
        <ul>
            <li>
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" required
                value="<?= $siw["nis"]; ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama"
                value="<?= $siw["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email"
                value="<?= $siw["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?= $siw["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar</label><br>
                <img src="img/<?= $siw["gambar"]; ?>" alt="" width="75px"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
              <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>


    </form>
    
</body>
</html>