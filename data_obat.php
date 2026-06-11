95% of storage used … If you run out, you can't create, edit, and upload files. Get 30 GB for IDR 3,500 for 3 months IDR 14,500.
<?php
session_start();
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM obat");
?>

<h2>Data Obat</h2>

<?php while($d = mysqli_fetch_assoc($data)) { ?>
    Nama: <?= $d['nama_obat']; ?> <br>
    Harga: <?= $d['harga']; ?> <br>
    Stok: <?= $d['stok']; ?> <br>
    <br>
<?php } ?>

<a href="dashboard.php">Kembali</a>