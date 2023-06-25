<?php 
    // mysql_connect("localhost","root","","admin"); //sesuaikan dengan password dan username mysql anda
    // mysql_select_db("metopel2"); //nama database yang kita gunakan


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "metopel2";
 
	$con = mysqli_connect($servername, $username, $password, $dbname); // menggunakan mysqli_connect
 
	if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
		echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
        exit();
	}
?>