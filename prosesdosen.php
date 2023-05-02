<?php

if(isset($_POST['submit'])){
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];


    include "koneksi.php";

    $qry = "INSERT INTO dosen VALUES (
        '$nidn', '$nama', '$kelas', '$gender', '$alamat', '$no_hp', '$email', '$tanggal_lahir'
    )";

    $exec = mysqli_query($con, $qry);

    if($exec){
        echo "<script>alert('Data berhasil disimpan, Jika ada kesalahan data silahkan edit data anda'); window.location = 'dosen.php';</script>";
    }else{
        echo "Data gagal disimpan";
    }
}

?>
