<?php
session_start();
include "koneksi.php";

if (isset($_POST['beli'])) {

    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];
    $bayar = $_POST['bayar'];

    $obat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM obat WHERE id=$id"));

    $total = $obat['harga'] * $jumlah;

    if ($bayar < $total) {
        echo "Uang kurang!";
    } else {
        $kembali = $bayar - $total;

        mysqli_query($conn, "UPDATE obat SET stok=stok-$jumlah WHERE id=$id");

        mysqli_query($conn, "INSERT INTO transaksi (id_obat, jumlah, total, bayar, kembali) 
        VALUES ($id, $jumlah, $total, $bayar, $kembali)");

        echo "<h3>Lunas</h3>";
        echo "Total: $total <br>";
        echo "Kembali: $kembali <br><br>";
    }
}

$obat = mysqli_query($conn, "SELECT * FROM obat");
?>

<h2>Transaksi</h2>

<form method="POST">
    Pilih Obat <br>
    <select name="id">
        <?php while($o = mysqli_fetch_assoc($obat)) { ?>
            <option value="<?= $o['id']; ?>">
                <?= $o['nama_obat']; ?> - Rp<?= $o['harga']; ?>
            </option>
        <?php } ?>
    </select><br><br>

    Jumlah <br>
    <input type="number" name="jumlah"><br><br>

    Bayar <br>
    <input type="number" name="bayar"><br><br>

    <button name="beli">Beli</button>
</form>

<a href="dashboard.php">Kembali</a>