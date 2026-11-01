<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="tambah.php"><button style="background-color: #5cb85c; color: white; padding: 5px 10px; border: none; cursor: pointer;">Tambah Data</button></a>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr style="background-color: #d9edf7;">
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        
        <?php 
        $query_supp = "SELECT * FROM supplier";
        $supp_result = mysqli_query($conn, $query_supp);
        $no = 1;
        ?>
        
        <?php if (mysqli_num_rows($supp_result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($supp_result)): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["telp"] ?></td>
                    <td><?= $row["alamat"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">
                            <button style="background-color: #f0ad4e; color: white; border: none; cursor: pointer;">Edit</button>
                        </a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">
                            <button style="background-color: #d9534f; color: white; border: none; cursor: pointer;">Hapus</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" align="center">Tidak ada data supplier</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>