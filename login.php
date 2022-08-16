<?php
session_start();
require 'function.php';

// cek cookie
if (isset($_COOKIE['num']) && isset($_COOKIE['key'])) {
    $num = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $num");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['usernamae'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie

                setcookie('num', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['usernamae']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
};

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="container py-5">
        <div class="row text-center text-white my-3">
            <h1>Halaman Login</h1>
        </div>

        <?php if (isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username atau Pasword salah</p>
        <?php endif;  ?>

        <div class="row d-flex flex-column px-2">
            <div class="col-md-5 login-form mx-auto p-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameInput">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me!</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-login mt-3">Login</button>
                </form>
                <div class="col mx-auto mt-3 text-end">
                    <p class="mb-1">belum punya akun?</p>
                    <a href="registrasi.php">Ke halaman registrasi</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>