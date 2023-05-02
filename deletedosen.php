<?php 
include 'koneksi.php';

$nidn = $_GET['nidn'];
$qry = "DELETE FROM dosen WHERE nidn='$nidn'";
$exec = mysqli_query($con, $qry);
 

if($exec){
    echo "<script>alert('Data berhasil dihapus'); window.location = 'dosen.php';</script>";
}else{
    echo "Data gagal dihapus";
}