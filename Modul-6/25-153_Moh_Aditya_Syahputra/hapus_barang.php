<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $barang_id = (int)$_GET['id'];

    $q_cek = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id = $barang_id LIMIT 1");

    if (mysqli_num_rows($q_cek) > 0) {
        echo "<script>
                alert('TIDAK BISA DIHAPUS: Barang tersebut masih digunakan pada transaksi!');
                window.location.href = 'barang.php';
              </script>";
    } else {
        mysqli_query($conn, "DELETE FROM barang WHERE id = $barang_id");
        echo "<script>
                alert('BERHASIL: Data barang telah dihapus.');
                window.location.href = 'barang.php';
              </script>";
    }
}
?>