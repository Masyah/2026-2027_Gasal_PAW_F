<?php
include "koneksi.php";
$q_barang = mysqli_query($conn, "SELECT * FROM barang");
?>
<!DOCTYPE html>
<html>
<head><title>Data Master Barang</title></head>
<body>
    <a href="index.php"><< Kembali ke Master Transaksi</a>
    <h2>Data Master Barang (Tugas 3)</h2>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while ($b = mysqli_fetch_assoc($q_barang)) { ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['kode_barang'] ?></td>
            <td><?= $b['nama_barang'] ?></td>
            <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
            <td>
                <a href="hapus_barang.php?id=<?= $b['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>