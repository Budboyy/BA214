<?php 
include 'koneksi.php';

$kodebrg = $_GET['kodebrg'];
$qry = "DELETE FROM barang WHERE kodebrg='$kodebrg'";
$exec = mysqli_query($con, $qry);
 

if($exec){
    echo "<script>alert('Data berhasil dihapus'); window.location = 'barang.php';</script>";
}else{
    echo "Data gagal dihapus";
}

?>