<?php

$koneksi = mysqli_connect("localhost", "root", "", "arkademy");

if($koneksi === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// $tableProduk = "SELECT * FROM produk";

// $result = mysqli_query($koneksi, $tableProduk);

?>
