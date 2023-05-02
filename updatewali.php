<?php

$nik = $_POST ['nik'];
$wali = $_POST ['wali'];
$pendidikan = $_POST ['pendidikan'];
$gender = $_POST ['gender'];
$alamat = $_POST ['alamat'];
$no_hp = $_POST ['no_hp'];
$email = $_POST ['email'];
$tanggal_lahir = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal_lahir'];

include "koneksi.php";

   $qry = "UPDATE wali SET
    wali = '$wali',
    pendidikan = '$pendidikan',
    gender = '$gender',
    alamat = '$alamat',
    no_hp = '$no_hp',
    email = '$email',
    tanggal_lahir = '$tanggal_lahir'
    WHERE nik = '$nik'
    ";

$exec = mysqli_query($con, $qry);

if($exec){
    echo "<script>alert('Data berhasil disimpan'); window.location = 'wali.php';</script>";
}else{
    echo "Data gagal disimpan";
}

