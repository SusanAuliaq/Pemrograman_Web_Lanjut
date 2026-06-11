<?php
include "koneksi.php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn,
        "INSERT INTO user(username,password,role)
        VALUES('$username','$password','user')"
    );

    echo "Registrasi berhasil! <a href='login.php'>Login</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register User</h2>

<form method="POST">

    Username:
    <br>
    <input type="text" name="username" required>

    <br><br>

    Password:
    <br>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit" name="register">
        Register
    </button>

</form>

<br>

<a href="login.php">Kembali ke Login</a>

</body>
</html>