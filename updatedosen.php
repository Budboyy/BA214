<?php

$nidn = $_POST ['nidn'];
$nama = $_POST ['nama'];
$kelas = $_POST ['kelas'];
$gender = $_POST ['gender'];
$alamat = $_POST ['alamat'];
$no_hp = $_POST ['no_hp'];
$email = $_POST ['email'];
$tanggal_lahir = $_POST['tahun']."-".$_POST['bulan']."-".$_POST['tanggal_lahir'];

include "koneksi.php";

   $qry = "UPDATE dosen SET
    nama = '$nama',
    kelas = '$kelas',
    gender = '$gender',
    alamat = '$alamat',
    no_hp = '$no_hp',
    email = '$email',
    tanggal_lahir = '$tanggal_lahir'
    WHERE nidn = '$nidn'
    ";

$exec = mysqli_query($con, $qry);

if($exec){
    echo "<script>alert('Data berhasil disimpan'); window.location = 'dosen.php';</script>";
}else{
    echo "Data gagal disimpan";
}

