<?php
require "koneksi.php";

$id_mahasiswa=$_POST['id_mahasiswa'];
$name = ($_POST['name']);
$email = ($_POST['email']);
$nim = ($_POST['nim']);
$pesan = ($_POST['pesan']); 
$phone = ($_POST['phone']);

$query = mysqli_query($con, "UPDATE tbl_mahasiswa SET name='$name', email='$email', nim='$nim', pesan='$pesan', phone='$phone' WHERE id_mahasiswa='$id_mahasiswa'");

if ($query){
    ?>
    <script type="text/javascript">
        alert("Update Data Berhasil!");
        window.location='index.php';
    </script>
    <?php
}else{
    ?>
    <script type="text/javascript">
        alert("Update Data Berhasil!");
        window.location='index.php';
    </script>
    <?php
}


?>