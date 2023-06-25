<?php
require "koneksi.php";

$name = ($_POST['name']);
$email = ($_POST['email']);
$nim = ($_POST['nim']);
$pesan = ($_POST['pesan']);
$phone = ($_POST['phone']);

$query = mysqli_query($con, "INSERT INTO tbl_mahasiswa (name, email, nim,  pesan, phone) VALUES ( '$name', '$email', '$nim', '$pesan', $phone)");

if($query == TRUE){
    echo "Berhasil di Tambahkan";
    header("location: index.php");
}
else{
    echo "Gagal di Tambahkan";
}


?>