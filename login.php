<?php
session_start();
require 'function.php';

// cek cookie
if ( isset($_COOKIE['num']) && isset($_COOKIE['key']) ) {
    $num = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $num");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash('sha256', $row['usernamae'])) {
        $_SESSION['login'] = true;
    }

}

if ( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if ( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if ( isset($_POST['remember']) ) {
                // buat cookie

                setcookie('num', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['usernamae']), time()+60);
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
</head>
<body>

<h1>Halaman Login</h1>

<?php if ( isset($error) ) : ?>
    <p style="color: red; font-style: italic;">Username atau Pasword salah</p>
<?php endif;  ?>

<form action="" method="post">
    <ul>
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me!</label>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
</form>

<p>belum punya akun?</p>
<a href="registrasi.php">ke halaman registrasi</a>
    
</body>
</html>