<?php

if(isset($_POST['submit'])){
    $nik = $_POST['nik'];
    $wali = $_POST['wali'];
    $pendidkan = $_POST['pedidikan'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];


    include "koneksi.php";

    $qry = "INSERT INTO wali VALUES (
        '$nik', '$wali', '$pendidikan', '$gender', '$alamat', '$no_hp', '$email', '$tanggal_lahir'
    )";

    $exec = mysqli_query($con, $qry);

    if($exec){
        echo "<script>alert('Data berhasil disimpan, Jika ada kesalahan data silahkan edit data anda'); window.location = 'wali.php';</script>";
    }else{
        echo "Data gagal disimpan";
    }
}

?>
