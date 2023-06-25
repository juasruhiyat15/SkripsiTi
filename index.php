<?php
require "sesion.php";
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tugas_metopel</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">
	<!-- Me -->
	<link rel="stylesheet" href="css/jus.css">

	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>

	<div class="wrapper">

		<?php include('Notifikasi.php'); ?>

		<div class="body-overlay"></div>

		<!-------sidebar--design------------>

		<div id="sidebar">
			<div class="sidebar-header bg-primary">
				<h3><span class="text-white">MENU UTAMA</span></h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li class="active">
					<a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
				</li>

				<li class="">
					<a href="#" class=""><i class="material-icons">library_books</i>Kalender </a>
				</li>

			</ul>
		</div>

		<!-------sidebar--design- close----------->



		<!-------page-content start----------->

		<div id="content">

			<!------top-navbar-start----------->

			<div class="top-navbar">
				<div class="xd-topbar">
					<div class="row">
						<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
							<div class="xp-menubar">
								<span class="material-icons text-white">signal_cellular_alt</span>
							</div>
						</div>

						<div class="col-md-5 col-lg-3 order-3 order-md-2">
							<div class="xp-searchbar">
								<form>
									<div class="input-group">
										<input type="search" class="form-control" placeholder="Search">
										<div class="input-group-append">
											<button class="btn" type="submit" id="button-addon2">Go
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>


						<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
							<div class="xp-profilebar text-right">
								<nav class="navbar p-0">
									<ul class="nav navbar-nav flex-row ml-auto">
										<li class="dropdown nav-item active">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<span class="material-icons">notifications</span>
												<span class="notification">1</span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">You Have New Messages</a></li>
											</ul>
										</li>

										<li class="dropdown nav-item">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<img src="img/user.jpg" style="width:40px; border-radius:50%;" />
												<span class="xp-user-live"></span>
											</a>
											<ul class="dropdown-menu small-menu">
												<li><a href="#">
														<span class="material-icons">person_outline</span>
														Profile
													</a></li>
												<li><a href="#">
														<span class="material-icons">settings</span>
														Settings
													</a></li>
												<li><a href="login.php">
														<span class="material-icons">logout</span>
														Logout
													</a></li>
											</ul>
										</li>

									</ul>
								</nav>
							</div>
						</div>

					</div>

					<div class="xp-breadcrumbbar text-center">
						<h4 class="page-title">Dashboard</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Skripsi</a></li>
							<li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
						</ol>
					</div>


				</div>
			</div>
			<!------top-navbar-end----------->


			<!------main-content-start----------->

			<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="alert alert-success btn-close" role="alert" id="myalert">
								Berhasil Hapus Data!
							</div>

							<!-- Managemen -->
							<div class="table-title">
								<div class="row">
									<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Data Skripsi</h2>
									</div>
									<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Tambahkan Data</span>
										</a>
										<a hidden href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
											<i class="material-icons">&#xE15C;</i>
											<span>Hapus</span>
										</a>
									</div>
								</div>
							</div>
							<!-- end Managemen -->



							<!-- Tabel Action -->
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th><span class="custom-checkbox" hidden>
												<input type="checkbox" id="selectAll">
												<label for="selectAll"></label></th>
										<th hidden>No</th>
										<th>Nama Mahasiswa</th>
										<th>Judul Skripsi</th>
										<th>NIM</th>
										<th>Alamat</th>
										<th>HP</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									<?php
									require "koneksi.php";


									$query = "SELECT * FROM tbl_mahasiswa";
									$query_run = mysqli_query($con, $query);

									if (mysqli_num_rows($query_run) > 0) {
										foreach ($query_run as $baris) {

											// $data = mysqli_query($con, "SELECT * FROM tbl_mahasiswa");
											// while ($baris = mysqli_fetch_array($data)) {

									?>

											<tr>
												<th><span class="custom-checkbox">
														<input type="checkbox" id="checkbox1" name="option[]" value="1">
														<label for="checkbox1"></label>
												</th>
												<th hidden><?php echo $baris['id_mahasiswa'] ?></th>
												<th><?php echo $baris['name'] ?></th>
												<th><?php echo $baris['email'] ?></th>
												<th><?php echo $baris['nim'] ?></th>
												<th><?php echo $baris['pesan'] ?></th>
												<th><?php echo $baris['phone'] ?></th>
												<th class="inden">
													<button style="padding-left: 17px; padding-right: 18px;" data-toggle="modal" type="submit" data-target="#modal-edit<?php echo $baris['id_mahasiswa'] ?>" class="btn btn-success btn-sm">Edit</button>
													<!-- <form action="delete.php" method="post"> -->
													<!-- <a href="delete.php" method="post"  name="delete_student" class="delete" data-toggle="modal" data-target="" value="<?= $baris['id_mahasiswa']; ?>">
														<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
													</a> -->
													<!-- </form> -->

													<!-- Action Delete -->
													<form action="" method="POST" class="d-inline">
														<button style="margin-top:5px;" id="btns" onclick="myFunction()" type="submit" name="delete_student" value="<?= $baris['id_mahasiswa']; ?>" class="btn btn-danger btn-sm">Hapus</button>
													</form>
													<!-- End Action Delete -->
												</th>

												<!----Delete modal start--------->
												<div class="modal fade" tabindex="-1" id="modal-hapus<?php echo $baris['id'] ?>">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Delete Data Skripsi</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<a href="#modal-hapus<?php echo $baris['id'] ?>" class="btn btn-danger" data-toggle="modal">
																<i class="material-icons">&#xE15C;</i>
																<span>Hapus</span>
															</a>
															<form action="hapus.php" method="post">
																<div class="modal-body">
																	<p>Are you sure you want to delete this data</p>
																	<p class="text-warning"><small>this action Cannot be Undone,</small></p>
																</div>
																<div class="modal-footer">
																	<input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel"></input>
																	<input type="button" class="btn btn-success" data-dismiss="modal" name="modal-hapus" value="<?php echo $baris['id'] ?>"></input>

																</div>
															</form>
														</div>
													</div>
												</div>

												<!----Edit modal start--------->
												<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit<?php echo $baris['id_mahasiswa'] ?>">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Edit Data Skripsi</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">

																<!-- Form Start -->
																<form action="update.php" method="POST">
																	<div hidden class="form-group">
																		<input type="text" name="id_mahasiswa" class="form-control" required value="<?php echo $baris['id_mahasiswa']; ?>">
																	</div>
																	<div class=" form-group">
																		<label>Nama</label>
																		<input type="text" class="form-control" name="name" required value="<?php echo $baris['name']; ?>">
																	</div>
																	<div class=" form-group">
																		<label>Judul Skripsi</label>
																		<input type="text" class="form-control" name="email" required value="<?php echo $baris['email']; ?>">
																	</div>
																	<div class=" form-group">
																		<label>NIM</label>
																		<input type="text" class="form-control" name="nim" required value="<?php echo $baris['nim']; ?>">
																	</div>
																	<div class=" form-group">
																		<label>Alamat</label>
																		<input type="text" class="form-control" name="pesan" required  value="<?php echo $baris['pesan']; ?>">
																	</div>
																	<div class=" form-group">
																		<label>HP</label>
																		<input type="text" class="form-control" name="phone" required value="<?php echo $baris['phone']; ?>">
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
																		<button type="submit" class="btn btn-success">Save</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
												<!----Edit-modal end--------->

										<?php
										}
									} else {
										echo "<h5> No Record Found </h5>";
									}
										?>
										<!----Delete modal end--------->

											</tr>
								</tbody>
							</table>
							<!-- End Tabel Action -->

							<div class="clearfix">
								<div class="hint-text">showing <b>5</b> out of <b>25</b></div>
								<ul class="pagination">
									<li class="page-item disabled"><a href="#">Previous</a></li>
									<li class="page-item active"><a href="#" class="page-link">1</a></li>
									<li class="page-item "><a href="#" class="page-link">2</a></li>
									<li class="page-item "><a href="#" class="page-link">3</a></li>
									<li class="page-item "><a href="#" class="page-link">4</a></li>
									<li class="page-item "><a href="#" class="page-link">5</a></li>
									<li class="page-item "><a href="#" class="page-link">Next</a></li>
								</ul>
							</div>

						</div>
					</div>


					<!----Add modal start--------->
					<form action="Add.php" method="POST">
						<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Tambah Mahasiswa</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Mahasiswa</label>
											<input type="text" class="form-control" name="name" required autocomplete="off">
										</div>
										<div class="form-group">
											<label>Judul Skripsi</label>
											<input type="text" class="form-control" name="email" required autocomplete="off">
										</div>
										<div class="form-group">
											<label>NIM</label>
											<input type="text" class="form-control" name="nim" required autocomplete="off">
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<input class="form-control" required name="pesan" autocomplete="off">
										</div>
										<div class="form-group">
											<label>HP</label>
											<input type="number" class="form-control" name="phone" required autocomplete="off">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
										<input type="submit" class="btn btn-success" name="submit" value="Tambah"></input>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!----Add modal end--------->

				</div>
			</div>

			<!------main-content-end----------->


			<!----footer-design------------->

			<footer class="footer">
				<div class="container-fluid">
					<div class="footer-in">
						<p class="mb-0">Copyright © 2023 by <a href="">SkripsiTI</a></p>
					</div>
				</div>
			</footer>

		</div>

	</div>
	<!-------complete html----------->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- Menut utama onclik -->
	<script type="text/javascript">
		$(document).ready(function() {
			$(".xp-menubar").on('click', function() {
				$("#sidebar").toggleClass('active');
				$("#content").toggleClass('active');
			});

			$('.xp-menubar,.body-overlay').on('click', function() {
				$("#sidebar,.body-overlay").toggleClass('show-nav');
			});

		});
	</script>
	<!-- End Menut utama onclik -->

	<!-- Alert -->
	<script>
		var myalert = document.getElementById('myalert');
		myalert.style.display = 'none'

		function myFunction() {
			myalert.style.display = 'block'
		}
	</script>
	<!-- End Alert -->

	<?php

	if (isset($_POST['delete_student'])) {
		$student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

		$query = "DELETE FROM tbl_mahasiswa WHERE id_mahasiswa='$student_id' ";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {
			// $_SESSION["sukses"] = 'Data Berhasil Disimpan';
			// header('Location: index.php'); 

	?>
			<script>
				alert('Hapus Data Berhasil.');
				window.location = 'index.php';
				header("location: index.php");
			</script>

		<?php
		} else {
		?>

	<?php
			// $_SESSION['message'] = "Student Not Deleted";
			// header("Location: index.php");
			// exit(0);
		}
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>