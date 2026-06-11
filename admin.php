<?php
include "koneksi.php";

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    mysqli_query($conn, "DELETE FROM transaksi WHERE id=$id");

    header("Location: admin.php");
}


$data = mysqli_query($conn, "
SELECT transaksi.*, obat.nama_obat, obat.harga
FROM transaksi
JOIN obat ON transaksi.id_obat = obat.id
ORDER BY transaksi.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Medkit</title>

    <style>
        body{
            font-family: Arial;
            background: #f2f2f2;
            margin: 0;
        }

        .container{
            width: 400px;
            margin: 50px auto;
        }

        h2{
            text-align: center;
        }

        .box{
            background: white;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .btn{
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        button{
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit{
            background: black;
            color: white;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Admin Medkit</h2>

<?php while($d = mysqli_fetch_assoc($data)) { ?>

<a href="edit.php?id=<?= $d['id']; ?>">
    <button>Edit</button>
</a>

<a href="admin.php?hapus=<?= $d['id']; ?>"
onclick="return confirm('Yakin ingin menghapus data?')">
    Hapus
</a>
<div class="box">

    <b>Obat:</b> <?= $d['nama_obat']; ?><br>
    <b>Harga:</b> Rp<?= $d['harga']; ?><br>
    <b>Jumlah:</b> <?= $d['jumlah']; ?><br>
    <b>Total:</b> Rp<?= $d['total']; ?><br>
    <b>Bayar:</b> Rp<?= $d['bayar']; ?><br>
    <b>Kembalian:</b> Rp<?= $d['kembalian']; ?><br>

    <div class="btn">
        <a href="edit.php?id=<?= $d['id']; ?>">
            <button class="edit">Edit</button>
        </a>
    </div>

</div>

<?php } ?>
<a href="logout.php">Keluar</a>
</div>
</body>
</html>
