<?php 
include 'koneksi.php';

$nik = $_GET['nik'];
$qry = "DELETE FROM wali WHERE nik='$nik'";
$exec = mysqli_query($con, $qry);
 

if($exec){
    echo "<script>alert('Data berhasil dihapus'); window.location = 'wali.php';</script>";
}else{
    echo "Data gagal dihapus";
}