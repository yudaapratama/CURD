<?php 
	$host = "localhost"; //Server database
	$user = "root"; //Username
	$pass = ""; //Password
	$db   = "belajar"; //Nama dari database

	$con = mysqli_connect($host, $user, $pass);
  	mysqli_select_db($con,$db);
  	if ($con) {
  		// echo "Koneksi database berhasil !!";
  	} else {
  		echo "Error saat koneksi ke database !!";
  	}

 ?>