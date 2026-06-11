<?php
session_start();

if (!isset($_SESSION['login'])) {
    die("Login dulu!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>

body{
    font-family: Arial;
    background: #f2f2f2;
}

.container{
    width: 700px;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

/* INI YANG BIKIN TIDAK DEMPET */
h2, p, a, div{
    margin-bottom: 12px;
}

.admin{
    background: #ffffff;
    padding: 10px;
    border-radius: 8px;
}

.user{
    background: #ffffff;
    padding: 10px;
    border-radius: 8px;
}

a{
    display: block;
    text-decoration: none;
    padding: 8px;
    background: black;
    color: white;
    text-align: center;
    border-radius: 5px;
}
</style>
</head>
<body>

<div class="container">

<h2>Dashboard</h2>

<?php if ($_SESSION['role'] == "admin") { ?>
    <div class="admin">
        Selamat Datang di Admin Medkit
    </div>
<?php } else { ?>
    <div class="user">
        Selamat Datang di User
    </div>
<?php } ?>

<br>

<?php if ($_SESSION['role'] == "admin") { ?>
    <a href="admin.php">Masuk</a>
<?php } else { ?>
    <a href="user.php">Masuk</a>
<?php } ?>

<a href="logout.php">Keluar</a>

</div>

</body>
</html>
