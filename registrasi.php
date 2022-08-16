<?php

require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('user baru berhasil ditambahkan!');
       </script> ";
    } else {
        echo mysqli_error($conn);
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/registrasi.css">

</head>

<body>
    <div class="container py-5">
        <div class="row text-center my-3 text-white">
            <h1>Halaman Registrasi</h1>
        </div>
        <div class="row d-flex justify-content-center px-2">
            <div class="col-md-5 regis-form mb-md-3 p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameInput">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" id="password2">
                    </div>
                    <button type="submit" name="register" class="btn btn-daftar">Daftar</button>
                </form>
                <div class="col mx-auto text-end">
                    <a href="login.php">Ke halaman login</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>