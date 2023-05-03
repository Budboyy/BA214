<?php

if(isset($_POST['submit'])){
    $kodebrg = $_POST ['kodebrg'];
    $namabrg = $_POST ['namabrg'];
    $harga = $_POST ['harga'];
    $stokbrg = $_POST ['stokbrg'];
    
    include "koneksi.php";

    $qry = "INSERT INTO barang VALUES (
        '$kodebrg', '$namabrg', '$harga', '$stokbrg', '$tanggal_input'
    )";

    $exec = mysqli_query($con, $qry);

    if($exec){
        echo "<script>alert('Data berhasil disimpan, Jika ada kesalahan data silahkan edit data anda'); window.location = 'barang.php';</script>";
    }else{
        echo "Data gagal disimpan";
    }
}

?>
