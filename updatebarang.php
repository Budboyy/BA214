<?php

$kodebrg = $_POST ['kodebrg'];
$namabrg = $_POST ['namabrg'];
$harga = $_POST ['harga'];
$stokbrg = $_POST ['stokbrg'];
$tanggal_input = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal_input'];

include "koneksi.php";

   $qry = "UPDATE barang SET
    namabrg = '$namabrg',
    harga = '$harga',
    stokbrg = '$stokbrg',
    tanggal_input = '$tanggal_input'
    WHERE kodebrg = '$kodebrg'
    ";

$exec = mysqli_query($con, $qry);

if($exec){
    echo "<script>alert('Data berhasil disimpan'); window.location = 'barang.php';</script>";
}else{
    echo "Data gagal disimpan";
}

?>

