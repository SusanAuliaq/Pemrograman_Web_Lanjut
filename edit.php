<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id")
);

if (isset($_POST['update'])) {

    $jumlah = $_POST['jumlah'];
    $bayar = $_POST['bayar'];

    $obat = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM obat WHERE id={$data['id_obat']}")
    );

    $total = $obat['harga'] * $jumlah;
    $kembalian = $bayar - $total;

    mysqli_query($conn,
        "UPDATE transaksi SET 
        jumlah=$jumlah,
        total=$total,
        bayar=$bayar,
        kembalian=$kembalian
        WHERE id=$id"
    );

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>

    <style>
        body{
            font-family: Arial;
            background: #f2f2f2;
        }

        .container{
            width: 300px;
            margin: 80px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        input{
            width: 90%;
            padding: 5px;
            margin-bottom: 10px;
        }

        button{
            padding: 5px 10px;
            background: orange;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Edit Transaksi</h2>

<form method="POST">

Jumlah:
<br>
<input type="number" name="jumlah" value="<?= $data['jumlah']; ?>">

<br>

Bayar:
<br>
<input type="number" name="bayar" value="<?= $data['bayar']; ?>">

<br><br>

<button type="submit" name="update">Simpan</button>

</form>

</div>

</body>
</html>