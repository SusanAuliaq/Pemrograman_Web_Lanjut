<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user 
        WHERE username='$username' 
        AND password='$password'");

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        header("Location: dashboard.php");
        exit;
    } else {
        echo "Login gagal!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username"><br>

        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit" name="login">Login</button>
    </form>
    <p style="margin-top: 15px; font-size: 14px;">
        Belum punya akun? <a href="register.php" style="color: black; text-decoration: underline; font-weight: bold;">Daftar Akun Baru</a>
    </p>

</div>

</body>
</html>