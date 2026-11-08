<?php
include "koneksi.php";

$transaksi_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

if (isset($_POST['tambah'])) {
    $barang_id = (int)$_POST['barang_id'];
    $qty = (int)$_POST['qty'];

    $q_harga = mysqli_query($conn, "SELECT harga FROM barang WHERE id = $barang_id");
    $data_harga = mysqli_fetch_assoc($q_harga);
    $harga =$data_harga['harga'];

    mysqli_query($conn, "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) 
                         VALUES ($transaksi_id,$barang_id, $harga,$qty)");

    mysqli_query($conn, "UPDATE transaksi 
                         SET total = (SELECT SUM(harga * qty) FROM transaksi_detail WHERE transaksi_id = $transaksi_id) 
                         WHERE id = $transaksi_id");

    header("Location: index.php?id=$transaksi_id");
    exit;
}

$q_master = mysqli_query($conn, "SELECT * FROM transaksi WHERE id = $transaksi_id");
$master = mysqli_fetch_assoc($q_master);

$q_detil = mysqli_query($conn, "SELECT td.*, b.nama_barang 
                                FROM transaksi_detail td 
                                JOIN barang b ON td.barang_id = b.id 
                                WHERE td.transaksi_id = $transaksi_id");

$barang_terpakai = [];
while ($row = mysqli_fetch_assoc($q_detil)) {
    $barang_terpakai[] =$row['barang_id'];
}
mysqli_data_seek($q_detil, 0); 
?>

<!DOCTYPE html>
<html>
<head><title>Master Detail Transaksi</title></head>
<body>
    <a href="barang.php">Ke Halaman Kelola Master Barang (Untuk Tugas 3)</a>
    <br><br>

    <table border="1">
        <tr><th colspan="2" align="left">Data Master Transaksi #<?= $master['id'] ?></th></tr>
        <tr><td>Tanggal</td><td><?= $master['waktu_transaksi'] ?></td></tr>
        <tr><td>Keterangan</td><td><?= $master['keterangan'] ?></td></tr>
        <tr><td><b>Total</b></td><td><b>Rp <?= number_format($master['total'], 0, ',', '.') ?></b></td></tr>
    </table>

    <br>

    <h3>Tambah Detail Barang</h3>
    <form method="POST">
        <select name="barang_id" required>
            <option value="">-- Pilih Barang --</option>
            <?php
            $q_barang = mysqli_query($conn, "SELECT * FROM barang");
            while ($b = mysqli_fetch_assoc($q_barang)) {$is_disabled = in_array($b['id'],$barang_terpakai) ? 'disabled' : '';
                $teks =$is_disabled ? '(Sudah ditambahkan)' : '';
                
                echo "<option value='{$b['id']}' {$is_disabled}>{$b['nama_barang']} - Rp{$b['harga']} {$teks}</option>";
            }
            ?>
        </select>
        Qty: <input type="number" name="qty" min="1" required>
        <button type="submit" name="tambah">Simpan Detail</button>
    </form>

    <br>

    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Harga Satuan</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($d = mysqli_fetch_assoc($q_detil)) { ?>
        <tr>
            <td><?= $d['nama_barang'] ?></td>
            <td>Rp <?= number_format($d['harga'], 0, ',', '.') ?></td>
            <td><?= $d['qty'] ?></td>
            <td>Rp <?= number_format($d['harga'] *$d['qty'], 0, ',', '.') ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>