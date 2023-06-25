<?php
session_start();
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas_metopel</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar bg-primary.bg-gradient bg-opacity-75 ps-5 pe-5 pt-2 shadow">
    <div class="container-fluid">
      <a class="navbar-brand brand text-white pe-auto">Skripsi<span class="bg-warning text-dark pe-1 ps-1 pe-auto">TI</span></a>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <!-- End Navar -->

  <!-- Form Login -->
  <div class="container atas">
    <div class="input-grup mb-3 border">
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required autocomplete="off" autofocus>
          <div id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"></input>
      </form>

      <?php
      if (isset($_POST['submit'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        // $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);//Register

        $query = mysqli_query($con, " SELECT * FROM users WHERE email='$email' "); //Login
        // $query = mysqli_query($con, "SELECT email FROM users WHERE email='$email' ");//Register
        $count = mysqli_num_rows($query);


        // register
        // if($count > 0){
        //   echo "Tidak Bisa Register";
        // }
        // else{
        //   $queryInsert = mysqli_query($con, "INSERT INTO users (email, password) VALUES ('$email', '$encryptedPassword')");

        // }if($queryInsert){
        //   echo "Register Succes!";

        // }
        // end Register

        // Login
        if ($count > 0) {
          $data = mysqli_fetch_array($query);
          if (password_verify($password, $data['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $data['email'];

            header("location: index.php");
          } else {
            echo "Password Anda Tidak Valid!";
          }
        }
        // end Login
        else {
          echo "Akun Anda Tidak Tersedia!";
        }
      }
      ?>

    </div>
  </div>
  <!-- End Form Login -->

  <!-- footer -->
  <div class="div-footer ">
    <footer class="fixed-bottom shadow">
      Copyright © 2023 by <a href="#">SkripsiTI</a>
    </footer>
  </div>
  <!-- end footer -->
</body>

</html>