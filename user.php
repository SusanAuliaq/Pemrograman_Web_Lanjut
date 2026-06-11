<?php
include "koneksi.php";

if (isset($_POST['beli'])) {

    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];

    $obat = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM obat WHERE id=$id")
    );

    $total = $obat['harga'] * $jumlah;

   $bayar = $_POST['bayar'];
    $kembalian = $bayar - $total;

    mysqli_query($conn, "INSERT INTO transaksi (id_obat, jumlah, total, bayar, kembalian)
    VALUES ($id, $jumlah, $total, $bayar, $kembalian)"
    );

    echo "<script>alert('Berhasil beli!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Beli Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Belanja Obat di Medkit</h2>

<form method="POST">

Pilih Obat:
<select name="id">
<?php
$data = mysqli_query($conn, "SELECT * FROM obat");
while($d = mysqli_fetch_assoc($data)) {
?>
<option value="<?= $d['id']; ?>">
<?= $d['nama_obat']; ?> - Rp<?= $d['harga']; ?>
</option>
<?php } ?>
</select>

<br><br>

Jumlah:
<input type="number" name="jumlah" required>

Uang Bayar:
<input type="number" name="bayar" required>

<br><br>

<button type="submit" name="beli">Beli Sekarang</button>

</form>

<br>
<a href="dashboard.php">Kembali</a>

</div>

</body>
</html>

#dashboard, data_obat, index, logout, style, trsnsaksi