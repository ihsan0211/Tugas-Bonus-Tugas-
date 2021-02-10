<?php
  include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arkademy</title>

    <link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body>
    <a class="btn tambah" href="tambah.php">+ &nbsp; Tambah Produk</a>

    <?php 
        $query = "SELECT * FROM produk ORDER BY id DESC";
        $result = mysqli_query($koneksi, $query);

        if(!$result) {
            die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }

        $no = 1;

        while($row = mysqli_fetch_assoc($result)) 
        {
    ?>

        <div class="card">
            <img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 300px;">
            <div class="container">
                <h4><b><?php echo $row['nama_produk']; ?></b></h4>
                <p><?php echo $row['keterangan']; ?></p>
                <p>Harga: Rp<?php echo number_format($row['harga'],0,',','.'); ?></p>
                <p>Stok: <?php echo $row['jumlah']; ?> pcs</p>
                <a class="btn" href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            </div>
        </div>
    <?php
                $no++;
        }
    ?>
</body>
</html>