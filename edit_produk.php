<?php
  include('koneksi.php');
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM produk WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if(!$result) {
            die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);

        if(!count($data)) {
            echo "<script>alert('Data tidak ditemukan pada table.');window.location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Masukan ID yang ingin di edit');window.location='index.php';</script>";
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Produk Arkademy</title>
  </head>
  <body>
      
        <h1>Edit Produk <?php echo $data['nama_produk'];?></h1>
      
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" autofocus="" required="" value="<?php echo $data['nama_produk'];?>"/>
          <input type="hidden" name="id" value="<?php echo $data['id'];?>" >
        </div>
        <div>
          <label>Keterangan</label>
         <input type="text" name="keterangan" required="" value="<?php echo $data['keterangan'];?>"/>
        </div>
        <div>
          <label>Harga</label>
         <span>Rp.</span><input type="number" name="harga" required="" value="<?php echo $data['harga'];?>"/>
        </div>
        <div>
          <label>Jumlah</label>
         <input type="number" name="jumlah" required="" value="<?php echo $data['jumlah'];?>" />
        </div>
        <div>
          <label>Gambar Produk</label>
          <img src="gambar/<?php echo $data['gambar_produk'];?>"style="width: 200px; margin: 5px;"  >
          <input type="file" name="gambar_produk" value="<?php echo $data['gambar_produk'];?>" />
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>