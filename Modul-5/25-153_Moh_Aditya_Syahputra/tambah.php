<?php 
include 'koneksi.php'; 

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    
    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Tambah Data Master Supplier Baru</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" placeholder="Nama" required></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telp" placeholder="telp" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" placeholder="alamat" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="simpan" style="background-color: #5cb85c; color: white;">Simpan</button>
                    <a href="index.php"><button type="button" style="background-color: #d9534f; color: white;">Batal</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>